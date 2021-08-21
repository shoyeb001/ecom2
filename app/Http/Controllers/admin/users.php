<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder

class users extends Controller
{
    function show(){
        $data['result'] = DB::table('users')->get();  //retriving data
        return view('admin/users/list', $data);   //persing one valur or param to list
    }
}
