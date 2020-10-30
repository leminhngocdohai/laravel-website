<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $data['products_featured']= Product::where('featured',1)->orderby('id','desc')->take(4)->get();
        $data['products_state']= Product::where('state',1)
        ->orderby('id','desc')->take(8)->get();
        return view('client.index',$data);
    }
    public function about(){
        return view('client.about.about');
    }
    public function contact(){
        return view('client.contact.contact');
    }

}
