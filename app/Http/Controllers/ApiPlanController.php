<?php

namespace App\Http\Controllers;

use App\ApiPlan;
use App\ApiList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ApiPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($slug)
    {
        $is_exists_api_details = ApiList::where('api_slug', $slug)->exists();
        if ($is_exists_api_details) {
            $api_details = ApiList::where('api_slug', $slug)->first();
            $all_package = ApiPlan::where('api_id', $api_details->api_id)->where('api_plane_status', "!=", 2)->get();
            return view('backend.apis.package.index')->with([
                'api_details' => $api_details,
                'all_package' => $all_package,
            ]);
        }
        return redirect(route('api.list'))->with([
            'msg' => 'No Api Found',
            'type' => 'danger'
        ]);
    }

    public function add_api_package(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'api_id' => 'required|numeric',
            'api_plan_title' => 'required',
            'api_plan_regular_price' => 'required',
            'api_plan_discounted_price' => 'required',
            'api_monthly_duration' => 'required',
            'api_plan_descripetion' => 'required',
            'api_plane_status' => 'required|in:0,1,2,3,4',
        ]);


        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 400);
        }
        try {
            $api_list = new ApiPlan();
            $api_list->api_id = $data['api_id'];
            $api_list->api_plan_title = $data['api_plan_title'];
            $api_list->api_plan_regular_price = $data['api_plan_regular_price'];
            $api_list->api_plan_discounted_price = $data['api_plan_discounted_price'];
            $api_list->api_monthly_duration = $data['api_monthly_duration'];
            $api_list->api_plane_status = $data['api_plane_status'];
            $api_list->api_discounted_off_text = $data['api_discounted_off_text'];
            $api_list->api_plan_descripetion = implode(',', $data['api_plan_descripetion']);
            $inserted = $api_list->save();

            if ($inserted) {
                return sendResponse(true, 'Package Inserted Successfully!', [], 200);
            } else {
                return sendResponse(false, 'Failed To Insert Package.', [], 400);
            }
        } catch (\Throwable $th) {
            return sendResponse(false, $th, [], 400);
        }
    }

    public function edit_api_package(Request $request)
    {
        $data = $request->all();
        if (isset($data['api_plan_id']) && !empty($data['api_plan_id'])) {
            $validator = Validator::make($data, [
                'api_id' => 'required|numeric',
                'api_plan_title' => 'required',
                'api_plan_regular_price' => 'required',
                'api_plan_discounted_price' => 'required',
                'api_monthly_duration' => 'required',
                'api_plan_descripetion' => 'required',
                'api_plane_status' => 'required|in:0,1,2,3,4',
            ]);

            if ($validator->fails()) {
                return sendResponse(false, $validator->errors(), $data, 400);
            }

            try {
                $is_exists_api_details = ApiPlan::where('api_plan_id', $data['api_plan_id'])->exists();
                if ($is_exists_api_details) {
                    $api_details = ApiPlan::where('api_plan_id', $data['api_plan_id'])->first();
                    $api_details->api_id = $data['api_id'];
                    $api_details->api_plan_title = $data['api_plan_title'];
                    $api_details->api_plan_regular_price = $data['api_plan_regular_price'];
                    $api_details->api_plan_discounted_price = $data['api_plan_discounted_price'];
                    $api_details->api_monthly_duration = $data['api_monthly_duration'];
                    $api_details->api_plane_status = $data['api_plane_status'];
                    $api_details->api_discounted_off_text = $data['api_discounted_off_text'];
                    $api_details->api_plan_descripetion = implode(',', $data['api_plan_descripetion']);
                    $inserted = $api_details->update();

                    if ($inserted) {
                        return sendResponse(true, 'Package Inserted Successfully!', [], 200);
                    } else {
                        return sendResponse(false, 'Failed To Insert Package.', [], 400);
                    }
                }
            } catch (\Throwable $th) {
                return sendResponse(false, $th, [], 400);
            }
        }
    }

    public function delete_api_package($id)
    {
        $is_exists_api_details = ApiPlan::where('api_plan_id', $id)->exists();
        if ($is_exists_api_details) {
            $api_details = ApiPlan::where('api_plan_id', $id)->first();
            $api_details->api_plane_status = 2;
            $deleted = $api_details->update();
            if ($deleted) {
                return redirect(route('api.list'))->with([
                    'msg' => __('Package Deleted successfully!'),
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'msg' => __('Failed to Delete Package!'),
                    'type' => 'danger'
                ]);
            }
        }
        return redirect()->back()->with([
            'msg' => 'No Api Found',
            'type' => 'danger'
        ]);
    }
}
