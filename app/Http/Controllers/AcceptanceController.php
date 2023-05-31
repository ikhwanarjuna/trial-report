<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Http\Requests\StoreAcceptanceRequest;
use App\Http\Requests\UpdateAcceptanceRequest;
use App\Models\Trial;
use Illuminate\Http\Request;
use App\Models\Trial_Machine_Result;
use App\Models\Trial_Machine;
use Yajra\DataTables\DataTables;

class AcceptanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Trial_Machine::where('trial_id', $request->id)->first();
        $acc = Trial_Machine_Result::latest()->where('trial_machine_id', $id->id)->get();
        if ($request->ajax()){
            return DataTables::of($acc)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editData">Edit</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger mx-1 btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }


        return view('content.apps.user.acceptance',[
            $data = Trial::where('id', $request->id)->first(),
            $mesin = Trial_Machine::where('trial_id', $data->id)->get(),
            'data'=> $data,
            'mesin' => $mesin

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAcceptanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Trial_Machine_Result::updateOrCreate([
            'id' => $request->id,
        ],
        [
        'result_per_shift_in_kg' => $request->result_per_shift_in_kg,
        'waste_in_kg' => $request->waste_in_kg,
        'waste_target_in_percent' => $request->waste_target_in_percent,
        'trial_machine_id' => $request->trial_machine_id,
        'ampere' => $request->ampere,
        'operator_number' => $request->operator_number
    ]);
    return response()->json(['success'=>'Data berhasil Disimpan.']);
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function show(Acceptance $acceptance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function edit(Acceptance $acceptance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcceptanceRequest  $request
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcceptanceRequest $request, Acceptance $acceptance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acceptance $acceptance)
    {
        //
    }
}
