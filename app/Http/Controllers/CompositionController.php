<?php

namespace App\Http\Controllers;

use App\Models\Composition;
use App\Http\Requests\StoreCompositionRequest;
use App\Http\Requests\UpdateCompositionRequest;
use App\Models\Trial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class CompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $composition = Composition::latest()->where('trial_id', $request->id)->get();
        if ($request->ajax()){
            return DataTables::of($composition)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editData">Edit</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger mx-1 btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

        return view('content.apps.user.composition', [
            $data = Trial::where('id', $request->id)->first(),
            'data'=> $data,

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
     * @param  \App\Http\Requests\StoreCompositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompositionRequest $request)
    {
        Composition::updateOrCreate([
            'id' => $request->id,
        ],
        [
        'item_code' => $request->item_code,
        'item_name' => $request->item_name,
        'trial_id' => $request->trial_id,
        'tonase' => $request->tonase,
        'percentage' => $request->percentage
    ]);
    return response()->json(['success'=>'Data berhasil Disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function show(Composition $composition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $composition)
    {
        $datas =Composition::find($composition->id);
        return response()->json($datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompositionRequest  $request
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Composition $composition)
    {
        $komposisi= [
            'trial_id' => $request->trial_id,
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'tonase' => $request->tonase,
            'percentage' => $request->percentage
        ];
        Composition::where('id', $request->id)->update($komposisi);
        return response()->json([
            'success' => true,
            'message'=>'Data berhasil dirubah. '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Composition $id)
    {
        Composition::destroy($id->id);      
        return response()->json(['success'=>'Data Berhasil Dihapus!']);
    }
}
