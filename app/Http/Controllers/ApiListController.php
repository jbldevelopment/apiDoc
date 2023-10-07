<?php

namespace App\Http\Controllers;

use App\ApiList;
use App\ApiCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ApiListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $all_page = ApiList::select('api_lists.*', 'api_categories.api_category_id', 'api_categories.api_category_title',)
            ->leftJoin('api_categories', 'api_lists.api_id', '=', 'api_categories.api_category_id')
            ->where('api_status', '!=', 2)
            ->get();
        return view('backend.apis.index')->with([
            'all_page' => $all_page,
        ]);
    }

    public function create_api()
    {
        $active_category = ApiCategory::where('api_category_status', '!=', 2)->get();
        return view('backend.apis.new')->with([
            'active_category' => $active_category,
        ]);
    }
    public function add_api(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'api_title' => 'required',
            'api_description' => 'required',
            'api_slug' => 'required|unique:api_lists',
            'api_status' => 'required|in:0,1',
            'api_type' => 'required|in:0,1',
            'api_category' => 'required',
            'api_order' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 400);
        }

        try {
            $api_list = new ApiList();
            $api_list->api_title = $data['api_title'];
            $api_list->api_description = $data['api_description'];
            $api_list->api_slug = $data['api_slug'];
            $api_list->api_status = $data['api_status'];
            $api_list->api_type = $data['api_type'];
            $api_list->api_category = $data['api_category'];
            $api_list->api_order = $data['api_order'];
            $api_list->api_link = $data['api_link'];
            $inserted = $api_list->save();

            if ($inserted) {
                return sendResponse(true, 'APi inserted successfully!', [], 200);
            } else {
                return sendResponse(false, 'Failed to insert APi.', [], 400);
            }
        } catch (\Throwable $th) {
            // return redirect(route('api.list'))->with([
            //     'msg' => $th,
            //     'type' => 'danger'
            // ]);
            return sendResponse(false, $th, [], 400);
        }
    }

    public function edit_api($slug)
    {
        $active_category = ApiCategory::where('api_category_status', '!=', 2)->get();
        $is_exists_api_details = ApiList::where('api_slug', $slug)->exists();
        if ($is_exists_api_details) {
            $api_details = ApiList::where('api_slug', $slug)->first();
            return view('backend.apis.edit')->with([
                'api_details' => $api_details,
                'active_category' => $active_category,
            ]);
        }
        return redirect(route('api.list'))->with([
            'msg' => 'No Api Found',
            'type' => 'danger'
        ]);
    }
    public function update_api(Request $request)
    {
        $data = $request->all();
        if (isset($data['api_id']) && !empty($data['api_id'])) {
            $validator = Validator::make($data, [
                'api_title' => 'required',
                'api_description' => 'required',
                'api_slug' => 'required',
                'api_status' => 'required|in:0,1',
                'api_type' => 'required|in:0,1',
                'api_category' => 'required',
                'api_order' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return sendResponse(false, $validator->errors(), $data, 400);
            }

            try {
                $is_exists_api_details = ApiList::where('api_id', $data['api_id'])->exists();
                if ($is_exists_api_details) {
                    $api_details = ApiList::where('api_id', $data['api_id'])->first();
                    $api_details->api_title = $data['api_title'];
                    $api_details->api_description = $data['api_description'];
                    $api_details->api_slug = $data['api_slug'];
                    $api_details->api_status = $data['api_status'];
                    $api_details->api_type = $data['api_type'];
                    $api_details->api_category = $data['api_category'];
                    $api_details->api_order = $data['api_order'];
                    $api_details->api_link = $data['api_link'];
                    $inserted = $api_details->update();

                    if ($inserted) {
                        return sendResponse(true, 'APi Updated successfully!', [], 200);
                    } else {
                        return sendResponse(false, 'Failed to Updated APi.', [], 400);
                    }
                }
            } catch (\Throwable $th) {
                return sendResponse(false, $th, [], 400);
            }
        }
        return sendResponse(false, 'Failed to Updated APIs!', [], 400);
    }

    public function delete_api($id)
    {
        $is_exists_api_details = ApiList::where('api_id', $id)->exists();
        if ($is_exists_api_details) {
            $api_details = ApiList::where('api_id', $id)->first();
            $api_details->api_status = 2;
            $deleted = $api_details->update();
            if ($deleted) {
                return redirect(route('api.list'))->with([
                    'msg' => __('API Deleted successfully!'),
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'msg' => __('Failed to Delete API!'),
                    'type' => 'danger'
                ]);
            }
        }
        return redirect(route('api.list'))->with([
            'msg' => 'No Api Found',
            'type' => 'danger'
        ]);
    }
    public function bulk_api_action(Request $request)
    {
        try {
            if (isset($request->ids) && !empty(isset($request->ids))) {
                $ids = $request->ids;
                $status = $request->action;
                $is_exists_api_details = ApiList::whereIn('api_id', $ids)->exists();
                if ($is_exists_api_details) {
                    $results = ApiList::whereIn('api_id', $ids)->update(['api_status' => $status]);
                    if ($results) {
                        return sendResponse(true, 'Action Triggred Successfully!', $is_exists_api_details, 200);
                    }
                }
                return sendResponse(false, 'Failed To Triggred Action.', [], 400);
            }
        } catch (\Throwable $th) {
            return sendResponse(false, $th, [], 400);
        }
    }
}
