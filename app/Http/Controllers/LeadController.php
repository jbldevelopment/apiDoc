<?php

namespace App\Http\Controllers;

use App\Lead;
use App\LeadMeta;
use App\LeadDump;
use App\ApiList;
use App\ApiCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $lead_list = Lead::orderBy('created_at', 'DESC')->orderBy('updated_at', 'DESC')->get();
        foreach ($lead_list as $lkey => $leads) {
            $lead_meta = LeadMeta::where('lead_id', $leads->lead_id)->orderBy('created_at', 'DESC')->limit(1)->get()->toArray();
            foreach ($lead_meta as $mkey => $meta) {
                $lead_meta_intrest = 'ENQUIRY';
                if (str_contains($meta['lead_intrest'], 'CAT-')) {
                    $new_intrest = str_replace('CAT-', '', $meta['lead_intrest']);
                    $lead_meta_intrest = ApiCategory::select('api_category_title')->where('api_category_id', $new_intrest)->first()->api_category_title;
                }
                if (str_contains($meta['lead_intrest'], 'API-')) {
                    $new_intrest = str_replace('API-', '', $meta['lead_intrest']);
                    $lead_meta_intrest = ApiList::select('api_title')->where('api_id', $new_intrest)->first()->api_title;
                }
                $lead_meta[$mkey]['intrest'] = $lead_meta_intrest;
            }
            $leads->meta_details = $lead_meta;
        }
        return view('backend.leads.index')->with([
            'lead_list' => $lead_list,
        ]);
    }
    public function update_lead(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'lead_name' => 'required',
            'lead_email' => 'required|email',
            'lead_mobile' => 'required',
            'lead_occupation' => 'required',
            'lead_verified' => 'required',
            'lead_status' => 'required',
        ]);
        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 410);
        }
        $lead_id =  $request->lead_id;
        try {
            $is_lead_exists = Lead::where('lead_id', $lead_id)->exists();
            if ($is_lead_exists) {
                $lead_exists = Lead::where('lead_id', $lead_id)->first();
                $lead_exists->lead_name = $request->lead_name;
                $lead_exists->lead_email = $request->lead_email;
                $lead_exists->lead_mobile = $request->lead_mobile;
                $lead_exists->lead_occupation = $request->lead_occupation;
                $lead_exists->lead_status = $request->lead_status;
                $lead_exists->lead_verified = $request->lead_verified;
                $result = $lead_exists->update();
                if ($result) {
                    return sendResponse(true, 'Lead details update succesfully', [], 200);
                }
                return sendResponse(false, 'Failed to update lead details.', [], 400);
            }
            return sendResponse(false, 'Lead Not Found', [], 400);
        } catch (\Throwable $th) {
            return sendResponse(false, $th, [], 401);
        }
    }
    public function edit_lead($id)
    {
        $is_exists_lead_details = LeadMeta::where('lead_id', $id)->exists();
        if ($is_exists_lead_details) {
            $lead_details = Lead::where('lead_id', $id)->first();
            $lead_meta = LeadMeta::where('lead_id', $lead_details->lead_id)->orderBy('created_at', 'DESC')->get();
            return view('backend.leads.edit')->with([
                'lead_details' => $lead_details,
                'lead_meta' => $lead_meta,
            ]);
        }
        return redirect(route('leads'))->with([
            'msg' => 'No API found',
            'type' => 'danger'
        ]);
    }
}
