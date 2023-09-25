<?php

namespace App\Http\Controllers;

use App\ApiCodeMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ApiCodeMetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function add_api_code(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'api_code_title' => 'required',
            'api_code_slug' => 'required',
            'api_code' => 'required',
            'api_meta_id' => 'required|numeric',
            'api_technology' => 'required|numeric',
            'api_code_order' => 'required|numeric',
            'api_code_status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 400);
        }
        try {
            if (isset($data['api_code_id']) && !empty($data['api_code_id'])) {
                // update
                $is_exists_api_details = ApiCodeMeta::where('api_code_id', $data['api_code_id'])->exists();
                if ($is_exists_api_details) {
                    $api_details = ApiCodeMeta::where('api_code_id', $data['api_code_id'])->first();
                    $api_details->api_code_title = $data['api_code_title'];
                    $api_details->api_code_slug = $data['api_code_slug'];
                    $api_details->api_code = $data['api_code'];
                    $api_details->api_meta_id = $data['api_meta_id'];
                    $api_details->api_technology = $data['api_technology'];
                    $api_details->api_code_order = $data['api_code_order'];
                    $api_details->api_code_status = $data['api_code_status'];
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
                $api_details = new ApiCodeMeta;
                $api_details->api_code_title = $data['api_code_title'];
                $api_details->api_code_slug = $data['api_code_slug'];
                $api_details->api_code = $data['api_code'];
                $api_details->api_meta_id = $data['api_meta_id'];
                $api_details->api_technology = $data['api_technology'];
                $api_details->api_code_order = $data['api_code_order'];
                $api_details->api_code_status = $data['api_code_status'];
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
