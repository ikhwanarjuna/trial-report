<?php

namespace App\Http\Controllers;

use App\Models\Acceptance_Result;
use App\Http\Requests\StoreAcceptance_ResultRequest;
use App\Http\Requests\UpdateAcceptance_ResultRequest;
use App\Models\Trial;
use Illuminate\Http\Request;
use App\Models\Trial_Machine_Result;
use App\Models\Trial_Machine;
use Yajra\DataTables\DataTables;
use App\Models\Acceptance;


class AcceptanceResultController extends Controller
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
            $criteria = Acceptance::all(),
            'data'=> $data,
            'mesin' => $mesin,
            'criteria'=> $criteria

        ]);
    }

    public function getAcceptanceResult(Request $request){
        $res = Acceptance_Result::latest()->where('trial_id', $request->id)->get();
        if ($request->ajax()){
            return DataTables::of($res)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editResult">Edit</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger mx-1 btn-sm deleteResult">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

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
     * @param  \App\Http\Requests\StoreAcceptance_ResultRequest  $request
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

    public function stores(Request $request)
    {
        Acceptance_Result::updateOrCreate([
            'id' => $request->id,
        ],
        [
        'trial_id' => $request->trial_id,
        'criteria_id' => $request->criteria_id,
        'standart' => $request->standart,
        'actual' => $request->actual,
        'approved' => $request->approved,
    ]);
    return response()->json(['success'=>'Data berhasil Disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acceptance_Result  $acceptance_Result
     * @return \Illuminate\Http\Response
     */
    public function show(Acceptance_Result $acceptance_Result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acceptance_Result  $acceptance_Result
     * @return \Illuminate\Http\Response
     */
    public function edit(Acceptance_Result $acceptance_Result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcceptance_ResultRequest  $request
     * @param  \App\Models\Acceptance_Result  $acceptance_Result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcceptance_ResultRequest $request, Acceptance_Result $acceptance_Result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acceptance_Result  $acceptance_Result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acceptance_Result $acceptance_Result)
    {
        //
    }
}
