<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Http\Requests\StoreProcessRequest;
use App\Http\Requests\UpdateProcessRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $proses)
    {
        if ($proses->ajax()){
            $data = Process::latest()->get();
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
        
        return view('content.apps.user.proses-list');
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
     * @param  \App\Http\Requests\StoreProcessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcessRequest $proses)
    {
        Process::updateOrCreate([
            'id' => $proses->id,
        ],
        [
            'name' => $proses->name,
            'sequence' => $proses->sequence
        ]);
        return response()->json(['message'=>'Data Berhasil Disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Process::find($id);
        return response()->json($datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcessRequest  $request
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proses= [
            'name' => $request->name,
            'sequence' => $request->sequence,
        ];
        Process::where('id', $id)->update($proses);
        return response()->json([
            'success' => true,
            'message'=>'Data berhasil dirubah. '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Process::find($id)->delete();
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
