<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder

class order extends Controller
{
    function list()
    {
        $data['result'] = DB::table('orders')->orderBy('id', 'desc')->get();  //retriving data
         return view('admin/order/list', $data);   //persing one valur or param to list


    }
    function details($order_number)
    {
        $data['result'] = DB::table('order_detail')->where('order_number',$order_number)->get();  //retriving data
         return view('admin/order/details', $data);   //persing one valur or param to list
    }
    function paid($id){
        $data['payment_status'] = "paid";
        DB::table('orders')->where('id',$id)->update($data);
        return redirect(url("/admin/orders"));

    }
    function status(Request $request, $order_number){
        $data['status'] = $request->input('status');
        DB::table('orders')->where('order_number',$order_number)->update($data);
        return redirect(url('admin/orders'));
    }
}
