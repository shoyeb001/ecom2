<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder

class profile extends Controller
{
    function edit()
    {
        $data['result'] = DB::table('admin')->where('id', session('ADMIN_ID'))->get();  //retriving data
        return view('admin/profile/profile', $data);   //persing one valur or param to list

    }
    function update(Request $request){
        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        );

        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->storeAs('/public/profile', $file);

            $data['photo']=$file;
        }

        DB::table('admin')->where('id', session('ADMIN_ID'))->update($data);
        $request->session()->flash('msg', 'Category updated Successfully');
        return redirect('admin/profile');
    }
    function update_password(Request $request){
        $result = DB::table('admin')->where('id',session('ADMIN_ID'))->get();
        $pre_pass = $request->input('pre_password');

        if ($result[0]->password == $pre_pass) {
            
        $data = array(
            'password' => $request->input('new_password'),
        );
        DB::table('admin')->where('id', session('ADMIN_ID'))->update($data);
        $request->session()->flash('msg', 'Password updated successfully');

        }else{
            $request->session()->flash('msg', 'Insert Correct Password');

        }
        return redirect('admin/change-password');


    }
}
