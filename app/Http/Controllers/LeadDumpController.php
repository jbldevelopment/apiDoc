<?php

namespace App\Http\Controllers;

use App\LeadDump;
use App\Lead;
use App\LeadMeta;
use App\ApiCategory;
use App\ApiList;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadMetaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

use App\Mail\LeadRecivedMail;
use App\Mail\thankYouMessage;
use Illuminate\Support\Facades\Mail;

class LeadDumpController extends Controller
{
    public function new_lead(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'lead_name' => 'required',
            'recaptchaResponse' => 'required|string',
            'lead_email' => 'required|email',
            'lead_mobile' => 'required',
            'lead_occupation' => 'required',
            'lead_intrest' => 'required',
            'lead_otp' => 'required',
        ]);

        $lead_email =  $request->lead_email;
        $lead_mobile =  $request->lead_mobile;
        $message =  'ok';

        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 410);
        }
        if (reCaptcha_verification($request)) {
            try {
                $user_id = ($request->lead_user_id > 0) ? $request->lead_user_id : 0;
                if ($user_id != 0) {
                    $is_lead_exists = Lead::where('lead_user_id', $user_id)->exists();
                    $lead_exists = new Lead();
                    if ($is_lead_exists) {
                        $lead_exists = Lead::where('lead_user_id', $user_id)->first();
                    }
                    return $this->create_lead($is_lead_exists, $lead_exists, $request, $user_id);
                } else {
                    $is_lead_exists = Lead::where('lead_email', $lead_email)->orWhere('lead_mobile', $lead_mobile)->exists();
                    $lead_exists = new Lead();
                    if ($is_lead_exists) {
                        $lead_exists = Lead::where('lead_email', $lead_email)->orWhere('lead_mobile', $lead_mobile)->first();
                    }
                    return $this->create_lead($is_lead_exists, $lead_exists, $request, $user_id);
                }
            } catch (\Throwable $th) {
                return sendResponse(false, $th, [], 400);
            }
            return sendResponse(false, 'Failed to insert API.', $request->all(), 400);
        } else {
            return sendResponse(false, 'reCAPTCHA verification failed. Please try again.', [], 400);
        }
    }
    function create_lead($is_lead_exists, $lead_exists, $request, $user_id)
    {

        $lead_exists->lead_user_id = $user_id;
        $lead_exists->lead_name = $request->lead_name;
        $lead_exists->lead_email = $request->lead_email;
        $lead_exists->lead_mobile = $request->lead_mobile;
        $lead_exists->lead_occupation = $request->lead_occupation;
        $lead_exists->lead_status = 0;
        $lead_exists->lead_verified = 1;
        $lead_exists->lead_otp = $request->lead_otp;
        $result = null;
        if ($is_lead_exists) {
            $result = $lead_exists->update();
        } else {
            $result = $lead_exists->save();
        }
        return $this->create_meta($lead_exists, $request);
    }
    function create_meta($lead_exists, $request)
    {
        $last_lead_id = $lead_exists->lead_id;

        $lead_meta = new LeadMeta();
        $lead_meta->lead_id = $last_lead_id;
        $lead_meta->lead_intrest = $request->lead_intrest;
        $lead_meta->lead_attchment = 0;
        $lead_meta->lead_status = 0;
        $result = $lead_meta->save();
        $last_lead_meta_id = $lead_meta->lead_meta_id;
        if ($result) {
            try {
                $lead_meta_intrest = "HOME-PAGE";
                if (str_contains($request->lead_intrest, 'CAT-')) {
                    $new_intrest = str_replace('CAT-', '', $request->lead_intrest);
                    $lead_meta_intrest = ApiCategory::select('api_category_title')->where('api_category_id', $new_intrest)->first()->api_category_title;
                }
                if (str_contains($request->lead_intrest, 'API-')) {
                    $new_intrest = str_replace('API-', '', $request->lead_intrest);
                    $lead_meta_intrest = ApiList::select('api_title')->where('api_id', $new_intrest)->first()->api_title;
                }
                $lead_mail_data = [
                    'name' => $request->lead_name,
                    'email' => $request->lead_email,
                    'mobile' => $request->lead_mobile,
                    'occupation' => $request->lead_occupation,
                    'intrest' => $lead_meta_intrest,
                ];
                Mail::to(env('MAIL_RECIVER_ADDRESS'))->send(new LeadRecivedMail($lead_mail_data));
                Mail::to($request->lead_email)->send(new thankYouMessage($lead_mail_data));
                return sendResponse(true, 'Lead intrest added', ['lead_id' => $last_lead_id, 'last_lead_meta_id' => $last_lead_meta_id], 200);
            } catch (\Exception $e) {
                return sendResponse(false, 'Failed to add lead intrest', ['error' => $e->getMessage()], 400);
            }
        }
        return sendResponse(false, 'Failed to add lead intrest', ['lead_id' => $last_lead_id], 400);
    }
}
