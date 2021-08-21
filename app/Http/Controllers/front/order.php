<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class order extends Controller
{
    function order(Request $request)
    {
        $user_ip_address = $request->ip();
        $user_id = session('USER_ID');
        $amount =  $request->input('total');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $payment_type = $request->input('payment_method');
        $order_id = uniqid('ORD');
        $data = array(
            'order_number' => $order_id,
            'user_id' => $user_id,
            'total_amount' => $amount,
            'quantity' => $request->input('qty'),
            'payment_status' => 'unpaid',
            'status' => 'new',
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'email' => $email,
            'phone' => $phone,
            'country' => $request->input('country'),
            'post_code' => $request->input('post_code'),
            'address1' => $request->input('landmark'),
            'address2' => $request->input('city'),
            'updated_at' => date('y-m-d h:i:s'),
            'created_at' => date('y-m-d h:i:s'),
            'payment_method'=>$payment_type

        );
        DB::table('orders')->insert($data);
        $cart = DB::table('carts')->where('user_id',$user_id)->get();
        foreach($cart as $list){
            $qty = $list->quantity;
            $order_number = $order_id;
            $amount = $list->amount;
            $price = $list->price;
            $product_id = $list->product_id;

            $order_details = array(
                'qty'=>$qty,
                'order_number'=>$order_number,
                'total' =>$amount,
                'price'=>$price,
                'product_id' => $product_id
            );

            DB::table('order_detail')->insert($order_details);
            
            $stock = DB::table('products')->where('id',$product_id)->get();

            $p_stock['stock']= $stock[0]->stock - $qty;
            DB::table('products')->where('id',$product_id)->update($p_stock);

        }


        if ($payment_type == 'cod') {
            
            $type = array(
                'payment_status' => 'unpaid',
            );
            DB::table('orders')->where('order_number',$order_id)->update($type);
            $shipping = array(
                'order_number' =>$order_id,
                'price' => $amount,
                'status' => 'active',
                'updated_at' => date('y-m-d h:i:s'),
                'created_at' => date('y-m-d h:i:s'),

            );
            DB::table('shippings')->insert($shipping);
            DB::table('carts')->where('user_id',$user_id)->delete();
            return redirect(url('/'));
        }
        if ($payment_type == 'online') {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    "X-Api-Key:test_cc081990a10e6b1a9e00f1fa435",
                    "X-Auth-Token:test_838c6a9a7da825bb44791b61608"
                )
            );
            $payload = array(
                'purpose' => 'Buying Goods',
                'amount' => $amount,
                'phone' => $phone,
                'buyer_name' => $request->input('fname'),
                'redirect_url' => 'http://localhost:8000/payment_success/'.$data['order_number'],
                'send_email' => true,
                'send_sms' => true,
                'email' => $email,
                'allow_repeated_payments' => false
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($response);
            $shipping = array(
                'order_number' =>$order_id,
                'price' => $amount,
                'status' => 'inactive',
                'updated_at' => date('y-m-d h:i:s'),
                'created_at' => date('y-m-d h:i:s'),
    
            );
            DB::table('shippings')->insert($shipping);
            return redirect($response->payment_request->longurl);
        }
    }
    function payment_success($order_id){
        $data = array(
            'payment_status' => 'paid' 
        );
        DB::table('orders')->where('order_number',$order_id)->update($data);
        $ship_status = array(
            'status' =>'active'
        );
        DB::table('shippings')->where('order_number',$order_id)->update($ship_status);
        DB::table('carts')->where('user_id',session('USER_ID'))->delete();

        return redirect(url('/'));
    }
}
