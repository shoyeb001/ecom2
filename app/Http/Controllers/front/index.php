<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //using query builder


class index extends Controller
{
    function featured_items(){
        $products = DB::table('products')->where('is_featured','1')->where('status','active')->get();

        
    }
}
