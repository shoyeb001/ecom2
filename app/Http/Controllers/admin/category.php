<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder

class category extends Controller
{
    function list()
    {
        $data['result'] = DB::table('categories')->orderBy('id', 'desc')->get();  //retriving data
        return view('admin/categories/list', $data);   //persing one valur or param to list
    }
    public static function cat_list(){
        $result = DB::table('categories')->where('status','active')->get();  //retriving data
        return $result;

    }
    function submit(Request $request)

    //feedback.wbmdfc@gmail.com
    //application id svmfc

    {
        //   $image = $request->file('img')->store('public/post');
        $image = $request->file('img');
        $ext = $image->extension();
        $file = time() . '.' . $ext;
        $image->storeAs('/public/categories', $file);
        $data = array(
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'summary' => $request->input('summary'),
            'photo' => $file,
            'status' => 1,
            'updated_at' => date('y-m-d h:i:s'),
            'created_at' => date('y-m-d h:i:s')
        );

        DB::table('categories')->insert($data);
        return redirect('admin/categories/list');
    }
    function delete(Request $request, $id)
    {
        DB::table('categories')->where('id', $id)->delete();
        $request->session()->flash('msg', 'category Deleted Successfully');
        return redirect(url('admin/categories/list'));
    }
    function edit($id)
    {
        $data['result'] = DB::table('categories')->where('id', $id)->get();  //retriving data
        return view('admin/categories/edit', $data);   //persing one valur or param to list

    }
    function update(Request $request, $id)
    {

        $data = array(
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'summary' => $request->input('summary'),
            'updated_at' => date('y-m-d h:i:s'),
        );

        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->storeAs('/public/categories', $file);

            $data['photo']=$file;
        }

        DB::table('categories')->where('id', $id)->update($data);
        $request->session()->flash('msg', 'Category updated Successfully');
        return redirect('admin/categories/list');
    }
    function deactive($id){
        $data = array(
        'status'=>'inactive'
        );
        DB::table('categories')->where('id',$id)->update($data);
        return redirect('admin/categories/list');

    }
    function active($id){
        $data = array(
        'status'=>'active'
        );
        DB::table('categories')->where('id',$id)->update($data);
        return redirect('admin/categories/list');

    }
}
