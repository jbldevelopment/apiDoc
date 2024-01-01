<?php

namespace App\Http\Controllers;

use App\ApiCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'api_category_short_desc' => 'required',
            'api_category_slug' => 'required|unique:api_categories',
            'api_category_status' => 'required|in:0,1',
            'api_category_order' => 'required|numeric',
            'api_category_bg_img_url' => 'required|image|mimes:jpeg,png,jpg,gif',
            'api_category_icon' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);


        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), [], 400);
        }
        $bg_imageName = $icon_imageName = '';
        if ($request->file()) {
            $bg_image = $request->file('api_category_bg_img_url');
            $bg_imageName = 'bg_' . time() . '.' . $bg_image->getClientOriginalExtension();
            $bg_imagePath = $bg_image->storeAs('image/category', $bg_imageName, 'public');

            $icon_image = $request->file('api_category_icon');
            $icon_imageName = 'icon_' . time() . '.' . $icon_image->getClientOriginalExtension();
            $icon_imagePath = $icon_image->storeAs('image/category/icon', $icon_imageName, 'public');
        }
        try {
            $api_list = new ApiCategory();
            $api_list->api_category_title = $data['api_category_title'];
            $api_list->api_category_descripetion = $data['api_category_descripetion'];
            $api_list->api_category_short_desc = $data['api_category_short_desc'];
            $api_list->api_category_slug = $data['api_category_slug'];
            $api_list->api_category_status = $data['api_category_status'];
            $api_list->api_category_order = $data['api_category_order'];
            $api_list->api_bg_img_url = $bg_imageName;
            $api_list->api_category_icon = $icon_imageName;
            $inserted = $api_list->save();

            if ($inserted) {
                return sendResponse(true, 'Category inserted successfully!', [], 200);
            } else {
                return sendResponse(false, 'Failed To insert Category!', [], 400);
            }
        } catch (\Throwable $th) {
            return sendResponse(false, $th, [], 400);
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
            'msg' => 'No category found',
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
                'api_category_short_desc' => 'required',
                'api_category_slug' => 'required',
                'api_category_status' => 'required|in:0,1',
                'api_category_order' => 'required|numeric',
                // 'api_category_bg_img_url' => 'required|image|mimes:jpeg,png,jpg,gif',
                // 'api_category_icon' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            if ($validator->fails()) {
                return sendResponse(false, $validator->errors(), [], 400);
            }
            $bg_imageName = $data['old_api_bg_img_url'];
            if ($request->file('api_category_bg_img_url')) {
                $bg_image = $request->file('api_category_bg_img_url');
                $bg_imageName = 'bg_' . time() . '.' . $bg_image->getClientOriginalExtension();
                $bg_imagePath = $bg_image->storeAs('image/category', $bg_imageName, 'public');
            }
            $icon_imageName = $data['old_api_category_icon'];
            if ($request->file('api_category_icon')) {
                $icon_image = $request->file('api_category_icon');
                $icon_imageName = 'icon_' . time() . '.' . $icon_image->getClientOriginalExtension();
                $icon_imagePath = $icon_image->storeAs('image/category/icon', $icon_imageName, 'public');
            }

            try {
                $is_exists_category_details = ApiCategory::where('api_category_id', $data['api_category_id'])->exists();
                if ($is_exists_category_details) {
                    $api_details = ApiCategory::where('api_category_id', $data['api_category_id'])->first();
                    $api_details->api_category_title = $data['api_category_title'];
                    $api_details->api_category_descripetion = $data['api_category_descripetion'];
                    $api_details->api_category_short_desc = $data['api_category_short_desc'];
                    $api_details->api_category_slug = $data['api_category_slug'];
                    $api_details->api_category_status = $data['api_category_status'];
                    $api_details->api_category_order = $data['api_category_order'];
                    $api_details->api_bg_img_url = $bg_imageName;
                    $api_details->api_category_icon = $icon_imageName;

                    $inserted = $api_details->update();

                    if ($inserted) {
                        return sendResponse(true, 'Category updated successfully!', [], 200);
                    } else {
                        return sendResponse(false, 'Failed To update category!', [], 400);
                    }
                }
                return sendResponse(false, 'Category not found!', [], 400);
            } catch (\Throwable $th) {
                return sendResponse(false, $th, [], 400);
            }
        }
        return sendResponse(false, 'Soemthing Went wrong', [], 400);
    }

    public function delete_category($id)
    {
        $is_exists_category_details = ApiCategory::where('api_category_id', $id)->exists();
        if ($is_exists_category_details) {
            $api_details = ApiCategory::where('api_category_id', $id)->first();
            $api_details->api_category_status = 2;
            $deleted = $api_details->update();
            if ($deleted) {
                return redirect(route('category.list'))->with([
                    'msg' => __('Category deleted successfully!'),
                    'type' => 'success'
                ]);
            } else {
                return redirect(route('category.list'))->with([
                    'msg' => __('Failed to delete API!'),
                    'type' => 'danger'
                ]);
            }
        }
        return redirect(route('category.list'))->with([
            'msg' => 'No category found',
            'type' => 'danger'
        ]);
    }

    public function bulk_category_action(Request $request)
    {
        try {
            if (isset($request->ids) && !empty(isset($request->ids))) {
                $ids = $request->ids;
                $status = $request->action;
                $is_exists_api_details = ApiCategory::whereIn('api_category_id', $ids)->exists();
                if ($is_exists_api_details) {
                    $results = ApiCategory::whereIn('api_category_id', $ids)->update(['api_category_status' => $status]);
                    if ($results) {
                        return sendResponse(true, 'Action triggred successfully!', $is_exists_api_details, 200);
                    }
                }
                return sendResponse(false, 'Failed to triggred action.', [], 400);
            }
        } catch (\Throwable $th) {
            return sendResponse(false, $th, [], 400);
        }
    }
}
