<?php

namespace App\Http\Controllers;

use App\Models\Trial_Material;
use App\Http\Requests\StoreTrial_MaterialRequest;
use App\Http\Requests\UpdateTrial_MaterialRequest;

class TrialMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTrial_MaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrial_MaterialRequest $request)
    {
        //
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