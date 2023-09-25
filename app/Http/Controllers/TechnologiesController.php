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
            'technolgy_name' => 'required|unique:technologies',
            'technolgy_slug' => 'required',
            'technolgy_status' => 'required|in:0,1',
            'technolgy_order' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return sendResponse(false, $validator->errors(), $data, 400);
        }

        try {
            $api_list = new Technologies();
            $api_list->technolgy_name = $data['technolgy_name'];
            $api_list->technolgy_slug = $data['technolgy_slug'];
            $api_list->technolgy_status = $data['technolgy_status'];
            $api_list->technolgy_order = $data['technolgy_order'];
            $inserted = $api_list->save();

            if ($inserted) {
                return redirect()->back()->with([
                    'msg' => __('Technology inserted successfully!'),
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'msg' => __('Failed to insert Technology!'),
                    'type' => 'danger'
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'msg' => $th,
                'type' => 'danger'
            ]);
        }
    }
    public function edit_techonlogy(Request $request)
    {
        $data = $request->all();
        if (isset($data['technolgy_id']) && !empty($data['technolgy_id'])) {
            $validator = Validator::make($data, [
                'technolgy_name' => 'required',
                'technolgy_slug' => 'required',
                'technolgy_status' => 'required|in:0,1',
                'technolgy_order' => 'required|numeric',
            ]);


            if ($validator->fails()) {
                return sendResponse(false, $validator->errors(), $data, 400);
            }
            try {
                $is_exists_technology = Technologies::where('technolgy_id', $data['technolgy_id'])->exists();
                if ($is_exists_technology) {
                    $technology = Technologies::where('technolgy_id', $data['technolgy_id'])->first();
                    $technology->technolgy_name = $data['technolgy_name'];
                    $technology->technolgy_slug = $data['technolgy_slug'];
                    $technology->technolgy_status = $data['technolgy_status'];
                    $technology->technolgy_order = $data['technolgy_order'];
                    $inserted = $technology->update();

                    if ($inserted) {
                        return redirect(route('techonlogy.list'))->with([
                            'msg' => __('technology updated successfully!'),
                            'type' => 'success'
                        ]);
                    } else {
                        return redirect()->back()->with([
                            'msg' => __('Failed to insert technology!'),
                            'type' => 'danger'
                        ]);
                    }
                }
                return redirect(route('techonlogy.list'))->with([
                    'msg' => __('technology not found!'),
                    'type' => 'danger'
                ]);
            } catch (\Throwable $th) {
                return redirect(route('techonlogy.list'))->with([
                    'msg' => $th,
                    'type' => 'danger'
                ]);
            }
        }
        return redirect(route('techonlogy.list'))->with([
            'msg' => __('Failed to insert Techonlogy!'),
            'type' => 'danger'
        ]);
    }
}
