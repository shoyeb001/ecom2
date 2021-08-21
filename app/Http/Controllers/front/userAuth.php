<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class userAuth extends Controller
{
    function signup(Request $request){
        $user_ip_address=$request->ip();
        $verify_id = uniqid('USER');
        $email = $request->input('email');
        $data = array(
            'name' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $email,
            'user_ip' => $user_ip_address,
            'verify_id'=> $verify_id,
            'status'=> "inactive",
            'updated_at' => date('y-m-d h:i:s'),
            'created_at' => date('y-m-d h:i:s')
        );


        DB::table('users')->insert($data);

        $details = [
            'title' => "Verify your email",
            'from' =>"devstacksolution@gmail.com",
            'body'=> "Please verify your email for active your account by clicking the below link.",
            'link'=> url("/verify/.$verify_id")

            
        ];
       

        \Mail::to($email)->send(new \App\Mail\verify($details));

        $request->session()->flash('msg', 'Please verify your account from email');
        return redirect(url('/login'));

    }
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $user_data = DB::table('users')->where('email',$email)->where('password',$password)->get();
        if (isset($user_data[0]->id)) {
            if ($user_data[0]->status == 'active') {
                $request->session()->put('USER_ID',$user_data[0]->id);
                return redirect(url('/'));
            }else{
                $request->session()->flash('msg','please verify your email');
                return redirect(url('/login'));
            }
        }else{
            $request->session()->flash('msg','please enter valid login information');
            return redirect(url('/login'));
        }
    }
    function logout(Request $request){
        $request ->session()->forget('USER_ID');
        $request->session()->flash('msg','You have been logout');
        return redirect('/login');
    }
    function verify_user(Request $request,$id){
        $data= array(
            'status'=>'active',
            'email_verified_at'=>date('y-m-d h:i:s')


        );
        DB::table('users')->where('verify_id',$id)->update($data);
        $request->session()->flash('msg', 'Your email has been verified. Please login');
        return redirect(url('/login'));

    }
    function forgot_password(Request $request){
        $email = $request->input('email');
        $password = uniqid();

        $data = array(
            "password" => $password,
            "status"=>"active"
        );

        DB::table('users')->where('email',$email)->update($data);

        $details = [
            'title' => "New Password",
            'from' =>"devstacksolution@gmail.com",
            'body'=> "Your new password is $password. and use it for login. Also you can reset your password clicking below",
            'link'=> url("/user/password-reset/$password")

            
        ];
       

        \Mail::to($email)->send(new \App\Mail\verify($details));

        $request->session()->flash('msg', 'We have sent the reset password in your ');
        return redirect(url('/login'));
    }
    
    function reset_view($id){
        $user['result'] = DB::table('users')->where('password',$id)->get();
        return view('front/front_pages/reset_password',$user);
    }
    function reset(Request $request){
        $new_password = $request->input('password');
        $old_password = $request->input('old_password');

        $data = array(
            'password' => $new_password
        );

        DB::table('users')->where('password',$old_password)->update($data);
        $request->session()->flash('msg', 'password updated successfully');
        return redirect(url('/login'));
    }
}
