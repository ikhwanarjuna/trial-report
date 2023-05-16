<?php

namespace App\Http\Controllers;

use App\Models\Trial_Material;
use App\Models\Trial;
use App\Http\Requests\StoreTrial_MaterialRequest;
use App\Http\Requests\UpdateTrial_MaterialRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';
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
    public function store($request)
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
        return response()->json($trial_Material->toArray());
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
    public function destroy($data)
    {
        Trial_Material::findOrFail($data->id)->delete();
        return response()->json(['success'=>'Data berhasil dihapus. ']);
    }
}