<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder

class product extends Controller
{
    function list()
    {
        $data['result'] = DB::table('products')->orderBy('id', 'desc')->get();  //retriving data
         return view('admin/product/list', $data);   //persing one valur or param to list


    }
    public static function get_cat($cat_id){
        $cat = DB::table('categories')->where('id',$cat_id)->get();

        return $cat;
    }
    public static function get_brand($brand_id){

        $brand = DB::table('brands')->where('id',$brand_id)->get();

        return $brand;
    }
    function submit(Request $request)

    //feedback.wbmdfc@gmail.com
    //application id svmfc

    {
        //   $image = $request->file('img')->store('public/post');
        $image = $request->file('img');
        $ext = $image->extension();
        $file = time() . '.' . $ext;
        $image->storeAs('/public/product', $file);
        $data = array(
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'description' => $request->input('desc'),
            'photo' => $file,
            'price'=> $request->input('price'),
            'stock' => $request->input('stock'),
            'is_featured'=>$request->input('featured'),
            'cat_id' => $request->input('category'),
            'status' => 1,
            'updated_at' => date('y-m-d h:i:s'),
            'created_at' => date('y-m-d h:i:s')
        );
        if ($request->input('brand')!='NULL') {
            $data['brand_id'] = $request->input('brand');
        }

        DB::table('products')->insert($data);
        return redirect('admin/product/list');
    }
    function delete(Request $request, $id)
    {
        DB::table('products')->where('id', $id)->delete();
        $request->session()->flash('msg', 'Product Deleted Successfully');
        return redirect(url('admin/product/list'));
    }
    function edit($id)
    {
        $data['result'] = DB::table('products')->where('id', $id)->get();  //retriving data
        return view('admin/product/edit', $data);   //persing one valur or param to list

    }
    function update(Request $request, $id)
    {

        $data = array(
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'description' => $request->input('desc'),
            'price'=> $request->input('price'),
            'stock' => $request->input('stock'),
            'is_featured'=>$request->input('featured'),
            'cat_id' => $request->input('category'),
            'status' => 1,
            'updated_at' => date('y-m-d h:i:s'),
        );

        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->storeAs('/public/product', $file);

            $data['photo']=$file;
        }

        if ($request->input('brand')!='NULL') {
            $data['brand_id'] = $request->input('brand');
        }



        DB::table('products')->where('id', $id)->update($data);
        $request->session()->flash('msg', 'Product updated Successfully');
        return redirect('admin/product/list');
    }
    function deactive($id){
        $data = array(
        'status'=>'inactive'
        );
        DB::table('products')->where('id',$id)->update($data);
        return redirect('admin/product/list');

    }
    function active($id){
        $data = array(
        'status'=>'active'
        );
        DB::table('products')->where('id',$id)->update($data);
        return redirect('admin/product/list');

    }


}
