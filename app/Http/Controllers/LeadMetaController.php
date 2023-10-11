<?php

namespace App\Http\Controllers;

use App\LeadMeta;
use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class LeadMetaController extends Controller
{

    public function update_lead_meta(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'lead_meta_id' => 'required',
            'lead_intrest' => 'required',
            'lead_status' => 'required',
        ]);
        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 400);
        }
        $lead_id =  $request->lead_meta_id;
        try {
            $is_lead_meta_exists = LeadMeta::where('lead_meta_id', $lead_id)->exists();
            if ($is_lead_meta_exists) {
                $lead_meta_exists = LeadMeta::where('lead_meta_id', $lead_id)->first();
                $lead_meta_exists->lead_intrest = $request->lead_intrest;
                $lead_meta_exists->lead_status = $request->lead_status;
                $result = $lead_meta_exists->update();
                if ($result) {
                    $is_lead_exists = Lead::where('lead_id', $lead_meta_exists->lead_id)->exists();
                    if ($is_lead_exists) {
                        $lead_exists = Lead::where('lead_id', $lead_meta_exists->lead_id)->first();
                        $is_lead_meta_letest = LeadMeta::where('lead_id', $lead_exists->lead_id)->orderBy('created_at', 'desc')->first();
                        if ($is_lead_meta_letest->lead_meta_id == $lead_id) {
                            $lead_exists->lead_status = $request->lead_status;
                            $result = $lead_exists->update();
                        }
                    }
                    return sendResponse(true, 'Lead Meta Details Update Succesfully', [$is_lead_meta_letest], 200);
                }
                return sendResponse(false, 'Failed To Update Lead Meta Details.', [], 400);
            }
            return sendResponse(false, 'Lead Meta Not Found', [], 400);
        } catch (\Throwable $th) {
            return sendResponse(false, $th, [], 401);
        }
    }
}
