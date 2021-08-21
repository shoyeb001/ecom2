<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder

class adminAuth extends Controller
{
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        

        $result = DB::table('admin')
                  ->where('email',$email)
                  ->where('password',$password)
                  ->get();

       if (isset($result[0]->id)) {
              $request->session()->put('ADMIN_ID',$result[0]->id);
              return redirect('admin/dashboard');
           
       }else{
           $request->session()->flash('msg','Please enter valid login details');
           return redirect('/admin');
       }


    }

    function logout(Request $request){
        $request ->session()->forget('ADMIN_ID');
        $request->session()->flash('msg','You have been logout');
        return redirect('/admin');
    }


}
