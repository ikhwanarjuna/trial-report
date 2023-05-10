<?php

namespace App\Http\Controllers;

use App\Models\Acceptance_Result;
use App\Http\Requests\StoreAcceptance_ResultRequest;
use App\Http\Requests\UpdateAcceptance_ResultRequest;

class AcceptanceResultController extends Controller
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
     * @param  \App\Http\Requests\StoreAcceptance_ResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcceptance_ResultRequest $request)
    {
        //
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
