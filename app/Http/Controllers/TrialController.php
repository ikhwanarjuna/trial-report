<?php

namespace App\Http\Controllers;

use App\Models\Trial;
use App\Http\Requests\StoreTrialRequest;
use App\Http\Requests\UpdateTrialRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Response;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
class TrialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $app)
    {

        if ($app->ajax()){
            $data = Trial::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('content.apps.user.app-user-list');
        

        // $pageConfigs = ['pageHeader' => false];
        // $datas = Trial::all();
        // return view('content.apps.user.app-user-list', compact('datas'));
            // 'datas' => Trial::latest()->get(),
            //'pageConfigs' => $pageConfigs
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
     * @param  \App\Http\Requests\StoreTrialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrialRequest $app)
    {

       Trial::updateOrCreate([
                'id' => $app->id,
                'document_number'     => $app->document_number, 
                'document_date'   => $app->document_date,
                'trial_type'   => $app->trial_type,
                'trial_note'   => $app->trial_note,
                'item_code'   => $app->item_code,
                'family_product'   => $app->family_product,
                'item_name'   => $app->item_name,
                'size'   => $app->size,
                'note'   => $app->note,
                'approval_created_by'   => $app->approval_created_by,
                'approval_created_date'   => $app->approval_created_date,
                'approval_plant_head_name'   => $app->approval_plant_head_name,
                'approval_plant_head_date'   => $app->approval_plant_head_date,
                'approval_ppic_name'   => $app->approval_ppic_name,
                'approval_ppic_date'   => $app->approval_ppic_date,
                'approval_gm_name'   => $app->approval_gm_name,
                'approval_gm_date'   => $app->approval_gm_date,
                'costing_approved'   => $app->costing_approved,
                'costing_staff_name'   => $app->costing_staff_name,
                'costing_approval_name'   => $app->costing_approval_name,
                'costing_approval_date'   => $app->costing_approval_date,  

        ]);

        return response()->json(['success'=>'Data Berhasil Disimpan.']);
   }
    //     $validator = Validator::make($app->all(),
    //     [
    //         'document_number'     => 'required', 
    //         'document_date'   => 'required',
    //         'trial_type'   => 'required',
    //         'trial_note'   => 'required',
    //         'item_code'   => 'required',
    //         'family_product'   => 'required',
    //         'item_name'   => 'required',
    //         'size'   => 'required',
    //         'note'   => 'required',
    //         'approval_created_by'   => 'required',
    //         'approval_created_date'   => 'required',
    //         'approval_plant_head_name'   => 'required',
    //         'approval_plant_head_date'   => 'required',
    //         'approval_ppic_name'   => 'required',
    //         'approval_ppic_date'   => 'required',
    //         'approval_gm_name'   => 'required',
    //         'approval_gm_date'   => 'required',
    //         'costing_approved'   => 'required',
    //         'costing_staff_name'   => 'required',
    //         'costing_approval_name'   => 'required',
    //         'costing_approval_date'   => 'required',

    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }
        
    

    //     // $validator = Validator::make($app->all(), [
    //     //     'document_number'     => 'required',
    //     // ]);

    //     //check if validation fails
    //     // if ($validator->fails()) {
    //     //     return response()->json($validator->errors(), 422);
    //     // }

    //     //create data
    //     $data = Trial::create([
    //         'document_number'     => $app->document_number, 
    //         'document_date'   => $app->document_date,
    //         'trial_type'   => $app->trial_type,
    //         'trial_note'   => $app->trial_note,
    //         'item_code'   => $app->item_code,
    //         'family_product'   => $app->family_product,
    //         'item_name'   => $app->item_name,
    //         'size'   => $app->size,
    //         'note'   => $app->note,
    //         'approval_created_by'   => $app->approval_created_by,
    //         'approval_created_date'   => $app->approval_created_date,
    //         'approval_plant_head_name'   => $app->approval_plant_head_name,
    //         'approval_plant_head_date'   => $app->approval_plant_head_date,
    //         'approval_ppic_name'   => $app->approval_ppic_name,
    //         'approval_ppic_date'   => $app->approval_ppic_date,
    //         'approval_gm_name'   => $app->approval_gm_name,
    //         'approval_gm_date'   => $app->approval_gm_date,
    //         'costing_approved'   => $app->costing_approved,
    //         'costing_staff_name'   => $app->costing_staff_name,
    //         'costing_approval_name'   => $app->costing_approval_name,
    //         'costing_approval_date'   => $app->costing_approval_date,
    //     ]);
        
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Berhasil Disimpan!',
    //         'data'    => $data  
    //     ]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function show(Trial $app)
    {
        $datas = DB::table('trials')
        ->join('trial__materials', 'trials.id', '=', 'trial__materials.trial_id')
        ->get();
        return view('content.apps.user.app-user-view-account',[
            'data'=> $app,
            'material'=> $datas

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function edit(Trial $trial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrialRequest  $request
     * @param  \App\Models\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrialRequest $request, Trial $trial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trial::find($id)->delete();
        return response()->json(['success'=>'Data berhasil dihapus. ']);
    }
}
