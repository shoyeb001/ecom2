<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder


class product extends Controller
{
    function list_product($slug){
        $category = DB::table('categories')->where('slug',$slug)->get();

        $data = DB::table('products')->where('cat_id',$category[0]->id)->where('status','active')->get();

        return view('front/front_pages/category', compact(['category','data']));
    }
    function cart(Request $request){

        $user_ip_address=$request->ip();
        $price =  $request->input('amount');
        $qty =  $request->input('add');
        $amount = $price * $qty;
        $product_id = $request->input('p_id');
        $product = DB::table('products')->where('id',$product_id)->get();
        if ($product[0]->stock<$qty) {
            $request->session()->flash('msg', 'Product stock is empty');
        }else {

        $data = array(
            'product_id' => $product_id ,
            'user_ip' => $user_ip_address,
            'price' => $price,
            'quantity' => $qty,
            'amount'=> $amount,
            'updated_at' => date('y-m-d h:i:s'),
            'created_at' => date('y-m-d h:i:s')
        );

        DB::table('carts')->insert($data);
    }
        return redirect(url()->previous());

    }
    function details($slug){
        $data['result'] = DB::table('products')->where('slug',$slug)->get();
        return view('front/front_pages/details',$data);
    }
    function best_deal(){
        $cat['result'] = DB::table('categories')->where('status','active')->get();

        return view('front/front_pages/bestdeals', $cat);


    }

}
