<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\DB;

class DataViewController extends Controller
{
    public function index(){
        // return view('content.apps.user.app-user-view-account',[
        //     'datas' => Data::all()
        // ]);
       
    }
}
