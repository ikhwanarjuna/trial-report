<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Http\Requests\StoreAcceptanceRequest;
use App\Http\Requests\UpdateAcceptanceRequest;

class AcceptanceController extends Controller
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
     * @param  \App\Http\Requests\StoreAcceptanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcceptanceRequest $request)
    {
        //
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
    public function edit(Acceptance $acceptance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcceptanceRequest  $request
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcceptanceRequest $request, Acceptance $acceptance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acceptance  $acceptance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acceptance $acceptance)
    {
        //
    }
}
