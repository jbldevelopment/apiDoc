<?php

namespace App\Http\Controllers;

use App\Lead;
use App\LeadMeta;
use App\ApiCategory;
use Illuminate\Http\Request;

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
                $lead_meta_intrest = '';
                if (str_contains($meta['lead_intrest'], 'CAT-')) {
                    $new_intrest = str_replace('CAT-', '', $meta['lead_intrest']);
                    $lead_meta_intrest = ApiCategory::select('api_category_title')->where('api_category_id', $new_intrest)->first()->api_category_title;
                }
                $lead_meta[$mkey]['intrest'] = $lead_meta_intrest;
            }
            $leads->meta_details = $lead_meta;
        }
        return view('backend.leads.index')->with([
            'lead_list' => $lead_list,
        ]);
    }
}
