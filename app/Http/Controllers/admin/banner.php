<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder

class banner extends Controller
{
    function list()
    {
        $data['result'] = DB::table('banners')->orderBy('id', 'desc')->get();  //retriving data
        return view('admin/banner/list', $data);   //persing one valur or param to list
    }
    function add(Request $request)
    {
        //   $image = $request->file('img')->store('public/post');
        $image = $request->file('img');
        $ext = $image->extension();
        $file = time() . '.' . $ext;
        $image->storeAs('/public/banner', $file);
        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('desc'),
            'photo' => $file,
            'status' => 1,
            'updated_at' => date('y-m-d h:i:s'),
            'created_at' => date('y-m-d h:i:s')


        );

        DB::table('banners')->insert($data);
        return redirect('admin/banner/list');
    }
    function delete(Request $request, $id)
    {
        DB::table('banners')->where('id', $id)->delete();
        $request->session()->flash('msg', 'Banner Deleted Successfully');
        return redirect(url('admin/banner/list'));
    }
    function edit($id)
    {
        $data['result'] = DB::table('banners')->where('id', $id)->get();  //retriving data
        return view('admin/banner/edit', $data);   //persing one valur or param to list

    }
    function update(Request $request, $id)
    {

        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('desc'),
            'updated_at' => date('y-m-d h:i:s'),
        );

        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->storeAs('/public/banner', $file);

            $data['img']=$file;
        }

        DB::table('banners')->where('id', $id)->update($data);
        $request->session()->flash('msg', 'Banner updated Successfully');
        return redirect('admin/banner/list');
    }
    function deactive($id){
        $data = array(
        'status'=>'inactive'
        );
        DB::table('banners')->where('id',$id)->update($data);
        return redirect('admin/banner/list');

    }
    function active($id){
        $data = array(
        'status'=>'active'
        );
        DB::table('banners')->where('id',$id)->update($data);
        return redirect('admin/banner/list');

    }

}
