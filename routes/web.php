<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front/index/index');
});

Route::group(['middleware'=>['adminAuth']],function(){

//admin routes

Route::view('/admin/dashboard','/admin/dashboard');

//admin banner
Route::view('/admin/banner/add','/admin/banner/add');
Route::post('/admin/banner/submit','admin\banner@add');
Route::post('/admin/banner/update/{id}','admin\banner@update');


Route::get('/admin/banner/list','admin\banner@list');
Route::get('/admin/banner/delete/{id}','admin\banner@delete');
Route::get('/admin/banner/edit/{id}','admin\banner@edit');
Route::get('/admin/banner/active/{id}','admin\banner@deactive');
Route::get('/admin/banner/inactive/{id}','admin\banner@active');


//category

Route::get('/admin/categories/list','admin\category@list');
Route::post('/admin/categories/submit','admin\category@submit');
Route::post('/admin/categories/update/{id}','admin\category@update');

Route::view('/admin/categories/add','/admin/categories/add');
Route::get('/admin/categories/edit/{id}','admin\category@edit');
Route::get('/admin/categories/active/{id}','admin\category@deactive');
Route::get('/admin/categories/inactive/{id}','admin\category@active');
Route::get('/admin/categories/delete/{id}','admin\category@delete');

//brands
Route::view('/admin/brands/add','/admin/brands/add');
Route::post('/admin/brands/submit','admin\brands@submit');
Route::get('/admin/brands/list','admin\brands@list');
Route::post('/admin/brands/update/{id}','admin\brands@update');
Route::get('/admin/brands/edit/{id}','admin\brands@edit');
Route::get('/admin/brands/active/{id}','admin\brands@deactive');
Route::get('/admin/brands/inactive/{id}','admin\brands@active');
Route::get('/admin/brands/delete/{id}','admin\brands@delete');

//product 

Route::view('/admin/product/add','/admin/product/add');
Route::post('/admin/product/submit','admin\product@submit');
Route::get('/admin/product/list','admin\product@list');
Route::post('/admin/product/update/{id}','admin\product@update');
Route::get('/admin/product/edit/{id}','admin\product@edit');
Route::get('/admin/product/active/{id}','admin\product@deactive');
Route::get('/admin/product/inactive/{id}','admin\product@active');
Route::get('/admin/product/delete/{id}','admin\product@delete');

//profile pages

Route::get('/admin/profile','admin\profile@edit');
Route::post('/admin/profile/update','admin\profile@update');
Route::view('/admin/change-password','admin/profile/password');
Route::post('/admin/profile/update-password','admin\profile@update_password');

Route::get('/admin/users','admin\users@show');

//orders

Route::get('/admin/orders','admin\order@list');

//order details

Route::get('/admin/order/details/{order_number}','admin\order@details');
Route::get('/admin/order/payment/paid/{id}','admin\order@paid');
Route::post('/admin/status/change/{order_number}','admin\order@status');





});
//admin login

Route::view('/admin','/admin/login');
Route::post('/admin/login','admin\adminAuth@login');
Route::get('/admin/logout','admin\adminAuth@logout');


//front end

Route::get('/category/{slug}','front\product@list_product');
Route::get('/product/{slug}','front\product@details');


//cart
Route::post('/checkout','front\product@cart');
Route::get('/remove-cart/{id}','front\carts@remove');
Route::view('/login','/front/front_pages/login');
Route::view('/about','/front/front_pages/about');
Route::view('/privacy-policy','/front/front_pages/privacy_policy');
Route::view('/terms-condition','/front/front_pages/privacy_policy');
Route::view('/contact-us','/front/front_pages/contact-us');

Route::get('/best-deals','front\product@best_deal');

Route::post('/login/signup','front\userAuth@signup');
Route::post('/login/login','front\userAuth@login');
Route::get('/verify/{id}','front\userAuth@verify_user');
Route::view('/forgot-password','/front/front_pages/forgot_password');
Route::post('/forgot','front\userAuth@forgot_password');
Route::get('user/password-reset/{id}','front\userAuth@reset_view');
Route::post('/reset','front\userAuth@reset');


Route::group(['middleware'=>['userAuth']],function(){
    Route::get('/checkout','front\carts@checkout');
    Route::get('/logout','front\userAuth@logout');
    Route::post('/order','front\order@order');
    Route::view('/payment','/front/front_pages/payment');
    Route::get('/payment_success/{order_id}','front\order@payment_success');
});

//mail 

Route::post('/mail', function(){
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $msg = $_POST['message'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $details = [
            'title' => $subject,
            'from' =>$email,
            'body' => $msg
        ];
       

        \Mail::to('skresturent@gmail.com')->send(new \App\Mail\contact($details));
        
        return redirect(url("/contact-us"));

        dd("Email is Sent.");
    }
});
