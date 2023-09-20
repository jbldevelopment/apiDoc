<?php

namespace App\Http\Controllers;

use App\ApiCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ApiCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $all_page = ApiCategory::where('api_category_status', '!=', 2)->get();
        return view('backend.category.index')->with([
            'all_page' => $all_page,
        ]);
    }
    public function create_category()
    {
        return view('backend.category.new');
    }
    public function add_category(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'api_category_title' => 'required',
            'api_category_descripetion' => 'required',
            'api_category_slug' => 'required|unique:api_categories',
            'api_category_status' => 'required|in:0,1',
            'api_category_order' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 400);
        }

        try {
            $api_list = new ApiCategory();
            $api_list->api_category_title = $data['api_category_title'];
            $api_list->api_category_descripetion = $data['api_category_descripetion'];
            $api_list->api_category_slug = $data['api_category_slug'];
            $api_list->api_category_status = $data['api_category_status'];
            $api_list->api_category_order = $data['api_category_order'];
            $inserted = $api_list->save();

            if ($inserted) {
                return redirect()->back()->with([
                    'msg' => __('Category inserted successfully!'),
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'msg' => __('Failed to insert API!'),
                    'type' => 'danger'
                ]);
            }
        } catch (\ThAPiable $th) {
            return redirect()->back()->with([
                'msg' => $th,
                'type' => 'danger'
            ]);
        }
    }
    public function edit_category($slug)
    {
        $is_exists_category_details = ApiCategory::where('api_category_slug', $slug)->exists();
        if ($is_exists_category_details) {
            $api_details = ApiCategory::where('api_category_slug', $slug)->first();
            return view('backend.category.edit')->with([
                'api_details' => $api_details,
            ]);
        }
        return redirect()->back()->with([
            'msg' => 'No Category Found',
            'type' => 'danger'
        ]);
    }
    public function update_category(Request $request)
    {
        $data = $request->all();
        if (isset($data['api_category_id']) && !empty($data['api_category_id'])) {
            $validator = Validator::make($data, [
                'api_category_title' => 'required',
                'api_category_descripetion' => 'required',
                'api_category_status' => 'required|in:0,1',
                'api_category_order' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return sendResponse(false, $validator->errors(), $data, 400);
            }

            try {
                $is_exists_category_details = ApiCategory::where('api_category_id', $data['api_category_id'])->exists();
                if ($is_exists_category_details) {
                    $api_details = ApiCategory::where('api_category_id', $data['api_category_id'])->first();
                    $api_details->api_category_title = $data['api_category_title'];
                    $api_details->api_category_descripetion = $data['api_category_descripetion'];
                    $api_details->api_category_slug = $data['api_category_slug'];
                    $api_details->api_category_status = $data['api_category_status'];
                    $api_details->api_category_order = $data['api_category_order'];

                    $inserted = $api_details->update();

                    if ($inserted) {
                        return redirect()->back()->with([
                            'msg' => __('Category updated successfully!'),
                            'type' => 'success'
                        ]);
                    } else {
                        return redirect()->back()->with([
                            'msg' => __('Failed to insert API!'),
                            'type' => 'danger'
                        ]);
                    }
                }
                return redirect()->back()->with([
                    'msg' => __('Category not found!'),
                    'type' => 'danger'
                ]);
            } catch (\ThAPiable $th) {
                return redirect()->back()->with([
                    'msg' => $th,
                    'type' => 'danger'
                ]);
            }
        }
        return redirect()->back()->with([
            'msg' => __('Failed to insert API!'),
            'type' => 'danger'
        ]);
    }

    public function delete_category($id)
    {
        $is_exists_category_details = ApiCategory::where('api_category_id', $id)->exists();
        if ($is_exists_category_details) {
            $api_details = ApiCategory::where('api_category_id', $id)->first();
            $api_details->api_category_status = 2;
            $deleted = $api_details->update();
            if ($deleted) {
                return redirect()->back()->with([
                    'msg' => __('Category Deleted successfully!'),
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'msg' => __('Failed to Delete API!'),
                    'type' => 'danger'
                ]);
            }
        }
        return redirect()->back()->with([
            'msg' => 'No Category Found',
            'type' => 'danger'
        ]);
    }
}
