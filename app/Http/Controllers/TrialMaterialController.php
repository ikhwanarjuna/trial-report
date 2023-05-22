<?php

namespace App\Http\Controllers;

use App\Models\Trial_Material;
use App\Models\Trial;
use App\Http\Requests\StoreTrial_MaterialRequest;
use App\Http\Requests\UpdateTrial_MaterialRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
class TrialMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $material = Trial_Material::latest()->where('trial_id', $request->id)->get();
        if ($request->ajax()){
            return DataTables::of($material)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editData">Edit</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger mx-1 btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
        return view('content.apps.user.app-user-view',[
            $data = Trial::where('id', $request->id)->first(),
            'data'=> $data,
            // 'material' => $material,

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
        $material = new Trial_Material();
        $material->item_code = $request->input('item_code');
        $material->item_name = $request->input('item_name');
        $material->qty_zack = $request->input('qty_zack');
        $material->qty_kg = $request->input('qty_kg');
        $material->trial_id = $request->input('trial_id');
        $material->save();

        return response()->json(['success'=>'Data berhasil Disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trial_Material  $trial_Material
     * @return \Illuminate\Http\Response
     */
    public function show(Trial_Material $trial_Material)
    {
        return response()->json([
            'success'=>true,
            'data' => $trial_Material
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trial_Material  $trial_Material
     * @return \Illuminate\Http\Response
     */
    public function edit(Trial_Material $id)
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
    public function update(UpdateTrial_MaterialRequest $request, $id)
    {
        $data= Trial_Material::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'success'=>'Data berhasil dirubah. '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trial_Material  $trial_Material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trial_Material $id)
    {
        Trial_Material::destroy($id->id);      
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}