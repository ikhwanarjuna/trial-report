<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Http\Requests\UpdateAcceptanceRequest;
use Illuminate\Http\Request;
use App\Models\Trial_Machine_Result;
use Yajra\DataTables\DataTables;

class AcceptanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $acceptance)
    {
        if ($acceptance->ajax()){
            $data = Acceptance::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editData">Edit</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger mx-1 btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('content.apps.user.criteria',[

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
        Acceptance::updateOrCreate([
            'id' => $request->id,
        ],
        [
        'name' => $request->name,
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
    public function edit($id)
    {
        $datas = Acceptance::find($id);
        return response()->json($datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcceptanceRequest  $request
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $criteria= [
            'name' => $request->name,
        ];
        Acceptance::where('id', $id)->update($criteria);
        return response()->json([
            'success' => true,
            'message'=>'Data berhasil dirubah. '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Acceptance  ::find($id)->delete();
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
