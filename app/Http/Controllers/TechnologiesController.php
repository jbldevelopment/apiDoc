<?php

namespace App\Http\Controllers;

use App\Technologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class TechnologiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $technologies = Technologies::all();
        return view('backend.technology.index')->with(['technologies' => $technologies]);
    }
    public function add_techonlogy(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'technology_name' => 'required|unique:technologies',
            'technology_slug' => 'required',
            'technology_status' => 'required|in:0,1,2',
            'technology_order' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 410);
        }

        try {
            $api_list = new Technologies();
            $api_list->technology_name = $data['technology_name'];
            $api_list->technology_slug = $data['technology_slug'];
            $api_list->technology_status = $data['technology_status'];
            $api_list->technology_order = $data['technology_order'];
            $inserted = $api_list->save();

            if ($inserted) {
                return sendResponse(true, 'Technology inserted successfully!', [], 200);
            } else {
                return sendResponse(false, 'Failed To insert technology.', [], 400);
            }
        } catch (\Throwable $th) {
            return sendResponse(false, $th, [], 400);
        }
    }
    public function edit_techonlogy(Request $request)
    {
        $data = $request->all();
        if (isset($data['technology_id']) && !empty($data['technology_id'])) {
            $validator = Validator::make($data, [
                'technology_name' => 'required',
                'technology_slug' => 'required',
                'technology_status' => 'required|in:0,1,2',
                'technology_order' => 'required|numeric',
            ]);


            if ($validator->fails()) {
                return sendResponse(false, $validator->errors(), $data, 410);
            }
            try {
                $is_exists_technology = Technologies::where('technology_id', $data['technology_id'])->exists();
                if ($is_exists_technology) {
                    $technology = Technologies::where('technology_id', $data['technology_id'])->first();
                    $technology->technology_name = $data['technology_name'];
                    $technology->technology_slug = $data['technology_slug'];
                    $technology->technology_status = $data['technology_status'];
                    $technology->technology_order = $data['technology_order'];
                    $inserted = $technology->update();

                    if ($inserted) {
                        return sendResponse(true, 'Technology updated successfully!', [], 200);
                    } else {
                        return sendResponse(false, 'Failed to update technology.', [], 400);
                    }
                }
                return sendResponse(false, 'Technology not found!', [], 400);
            } catch (\Throwable $th) {
                return sendResponse(false, $th, [], 400);
            }
        }
        return sendResponse(false, 'Failed to update techonlogy!', [], 400);
    }
}
