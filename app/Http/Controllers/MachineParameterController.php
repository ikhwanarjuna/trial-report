<?php

namespace App\Http\Controllers;

use App\Models\MachineParameter;
use App\Http\Requests\StoreMachineParameterRequest;
use App\Http\Requests\UpdateMachineParameterRequest;

class MachineParameterController extends Controller
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
     * @param  \App\Http\Requests\StoreMachineParameterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMachineParameterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MachineParameter  $machineParameter
     * @return \Illuminate\Http\Response
     */
    public function show(MachineParameter $machineParameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MachineParameter  $machineParameter
     * @return \Illuminate\Http\Response
     */
    public function edit(MachineParameter $machineParameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMachineParameterRequest  $request
     * @param  \App\Models\MachineParameter  $machineParameter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMachineParameterRequest $request, MachineParameter $machineParameter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MachineParameter  $machineParameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(MachineParameter $machineParameter)
    {
        //
    }
}
