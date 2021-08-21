<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder


class carts extends Controller
{
    function remove($id){
        DB::table('carts')->where('id',$id)->delete();
        return redirect(url()->previous());
    }
    function checkout(Request $request){
        $user_id = session('USER_ID');
        $user_ip = $request->ip();
        $data = array(
            'user_id' => $user_id,
            
        );

        DB::table('carts')->where('user_ip',$user_ip)->update($data);
        $item['result'] =  DB::table('carts')->where('user_id',$user_id)->get();
        return view('front/front_pages/checkout',$item);

    }

}
