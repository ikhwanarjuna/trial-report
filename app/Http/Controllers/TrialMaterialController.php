<?php

namespace App\Http\Controllers;

use App\Models\Trial_Material;
use App\Models\Trial;
use App\Http\Requests\StoreTrial_MaterialRequest;
use App\Http\Requests\UpdateTrial_MaterialRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class TrialMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $material = Trial_Material::latest()->get();
            return DataTables::of($material)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('content.apps.user.app-user-view',[
            $data = Trial::where('id', $request->id)->first(),
            'data'=> $data,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $material)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrial_MaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrial_MaterialRequest $request)
    {
        Trial_Material::updateOrCreate([
            'id' => $request->id
        ],
        [   
            'trial_id' => $request->trial_id,
            'item_code' => $request->item_code,
            'item_name'=> $request->item_name,
            'qty_zack'=> $request->qty_zack,
            'qty_kg' => $request -> qty_kg,
        ]);
        return response()->json(['message' =>'Berhasil Menambah Data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trial_Material  $trial_Material
     * @return \Illuminate\Http\Response
     */
    public function show(Trial_Material $trial_Material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trial_Material  $trial_Material
     * @return \Illuminate\Http\Response
     */
    public function edit(Trial_Material $trial_Material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrial_MaterialRequest  $request
     * @param  \App\Models\Trial_Material  $trial_Material
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrial_MaterialRequest $request, Trial_Material $trial_Material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trial_Material  $trial_Material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trial_Material $trial_Material)
    {
        //
    }
}