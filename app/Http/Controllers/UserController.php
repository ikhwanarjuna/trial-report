<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserList extends Controller
{
    public function index(){
        return view('content.apps.user.add-user-list');
    }
}
