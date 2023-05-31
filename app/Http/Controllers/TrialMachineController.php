<?php

namespace App\Http\Controllers;

use App\Models\Trial_Machine;
use App\Http\Requests\StoreTrial_MachineRequest;
use App\Http\Requests\UpdateTrial_MachineRequest;
use Illuminate\Http\Request;
use App\Models\Trial;
use App\Models\MachineParameter;
use App\Models\Process;
use Yajra\DataTables\DataTables;

class TrialMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $id = Trial_Machine::where('trial_id', $request->id)->first();
        $param = MachineParameter::latest()->where('trial_machine_id', $id->id)->get();
        if ($request->ajax()){
            return DataTables::of($param)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editData">Edit</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger mx-1 btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);    
            }
            

        return view('content.apps.user.trial-machine',[
            $data = Trial::where('id', $request->id)->first(),
            $proses = Process::all(),
            $mesin = Trial_Machine::where('trial_id', $data->id)->get(),
            'data'=> $data,
            'mesin'=> $mesin,
            'proses'=> $proses,

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
     * @param  \App\Http\Requests\StoreTrial_MachineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Trial_Machine::updateOrCreate([
            'id' => $request->id,
        ],
        [
        'machine_number' => $request->machine_number,
        'process_id' => $request->process_id,
        'trial_id' => $request->trial_id,
    ]);  
        return response()->json(['success'=>'Data berhasil Disimpan.']);
    }

    public function stores(Request $request)
    {
        MachineParameter::updateOrCreate([
            'id' => $request->id,
        ],
        [
            'name'=> $request->name,
            'trial_machine_id'=> $request->trial_machine_id,
            'parameter' => $request->parameter,
            'ampere' => $request->ampere
        ]);

        return response()->json(['success'=> 'Data Berhasil Ditambah!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trial_Machine  $trial_Machine
     * @return \Illuminate\Http\Response
     */
    public function show(Trial_Machine $trial_Machine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trial_Machine  $trial_Machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $param)
    {
        $datas =MachineParameter::find($param->id);
        return response()->json($datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrial_MachineRequest  $request
     * @param  \App\Models\Trial_Machine  $trial_Machine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrial_MachineRequest $request, Trial_Machine $trial_Machine)
    {
        $param= [
            'trial_machine_id' => $request->trial_machine_id,
            'name' => $request->name,
            'parameter' => $request->parameter,
            'ampere' => $request->ampere
        ];
        MachineParameter::where('id', $request->id)->update($param);
        return response()->json([
            'success' => true,
            'message'=>'Data berhasil dirubah. '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trial_Machine  $trial_Machine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trial_Machine::destroy($id);      
        return response()->json(['success'=>'Data Berhasil Dihapus!']);
    }

    public function delete($id)
    {
        MachineParameter::destroy($id);
        return response()->json(['success'=>'Data Berhasil Dihapus!']);
    }
}
