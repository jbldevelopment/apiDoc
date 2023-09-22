<?php

namespace App\Http\Controllers;

use App\ApiMeta;
use App\ApiList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ApiMetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function create_api_meta($slug)
    {
        $is_exists_api_details = ApiList::where('api_slug', $slug)->exists();
        if ($is_exists_api_details) {
            $api_details = ApiList::where('api_slug', $slug)->first();
            $api_meta_list = ApiMeta::where('api_id', $api_details->api_id)->orderBy('api_meta_order')->get();
            return view('backend.apis.meta.edit')->with([
                'api_details' => $api_details,
                'api_meta_list' => $api_meta_list,
            ]);
        }
        return redirect()->back()->with([
            'msg' => 'No Api Found',
            'type' => 'danger'
        ]);
    }

    public function add_api_meta(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'api_title' => 'required',
            'api_slug' => 'required',
            'api_description' => 'required',
            'api_status' => 'required|in:0,1',
            'api_order' => 'required|numeric',
            'meta_version' => 'required',
        ]);

        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 400);
        }
        try {
            if (isset($data['api_meta_id']) && !empty($data['api_meta_id'])) {
                // update
                $is_exists_api_details = ApiMeta::where('api_meta_id', $data['api_meta_id'])->exists();
                if ($is_exists_api_details) {
                    $api_details = ApiMeta::where('api_meta_id', $data['api_meta_id'])->first();
                    $api_details->api_meta_title = $data['api_title'];
                    $api_details->api_meta_descripetion = $data['api_description'];
                    $api_details->api_meta_slug = $data['api_slug'];
                    $api_details->api_meta_version = $data['meta_version'];
                    $api_details->api_meta_order = $data['api_order'];
                    $api_details->api_meta_status = $data['api_status'];
                    $api_details->api_meta_link = $data['api_link'];
                    $inserted = $api_details->update();

                    if ($inserted) {
                        return sendResponse($status = true,  __('API updated successfully!'), [], 200);
                    } else {
                        return sendResponse($status = false,  __('Failed to insert API!'), [], 400);
                    }
                    return sendResponse($status = false,  __('API not found!'), [], 400);
                }
            } else {
                // insert
                $api_details = new ApiMeta;
                $api_details->api_id = $data['api_id'];
                $api_details->api_meta_title = $data['api_title'];
                $api_details->api_meta_descripetion = $data['api_description'];
                $api_details->api_meta_slug = $data['api_slug'];
                $api_details->api_meta_version = $data['meta_version'];
                $api_details->api_meta_order = $data['api_order'];
                $api_details->api_meta_status = $data['api_status'];
                $api_details->api_meta_link = $data['api_link'];
                $inserted = $api_details->save();

                if ($inserted) {
                    return sendResponse($status = true,  __('API updated successfully!'), [], 200);
                } else {
                    return sendResponse($status = false,  __('Failed to insert API!'), [], 400);
                }
            }
        } catch (\ThAPiable $th) {
            return sendResponse($status = false,  $th, [], 400);
        }
    }
}
