<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder


class brands extends Controller
{
    function list()
    {
        $data['result'] = DB::table('brands')->orderBy('id', 'desc')->get();  //retriving data
        return view('admin/brands/list', $data);   //persing one valur or param to list
    }
    public static function brand_list(){
        $result = DB::table('brands')->where('status','active')->get();
        return $result;
    }

    function submit(Request $request)
    {
        //   $image = $request->file('img')->store('public/post');
        $image = $request->file('img');
        $ext = $image->extension();
        $file = time() . '.' . $ext;
        $image->storeAs('/public/brands', $file);
        $data = array(
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'photo' => $file,
            'status' => 1,
            'updated_at' => date('y-m-d h:i:s'),
            'created_at' => date('y-m-d h:i:s')
        );

        DB::table('brands')->insert($data);
        $request->session()->flash('msg', 'Brand Added Successfully');

        return redirect('admin/brands/list');
    }
    function delete(Request $request, $id)
    {
        DB::table('brands')->where('id', $id)->delete();
        $request->session()->flash('msg', 'Brand Deleted Successfully');
        return redirect(url('admin/brands/list'));
    }
    function edit($id)
    {
        $data['result'] = DB::table('brands')->where('id', $id)->get();  //retriving data
        return view('admin/brands/edit', $data);   //persing one valur or param to list

    }
    function update(Request $request, $id)
    {

        $data = array(
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'updated_at' => date('y-m-d h:i:s'),
        );

        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->storeAs('/public/brands', $file);

            $data['photo']=$file;
        }

        DB::table('brands')->where('id', $id)->update($data);
        $request->session()->flash('msg', 'Brand updated Successfully');
        return redirect('admin/brands/list');
    }
    function deactive($id){
        $data = array(
        'status'=>'inactive'
        );
        DB::table('brands')->where('id',$id)->update($data);
        return redirect('admin/brands/list');

    }
    function active($id){
        $data = array(
        'status'=>'active'
        );
        DB::table('brands')->where('id',$id)->update($data);
        return redirect('admin/brands/list');

    }
}
