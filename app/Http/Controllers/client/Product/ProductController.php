<?php

namespace App\Http\Controllers\client\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(){
        $products = Product::orderby('id','desc')->paginate(6);
        return view('client.product.shop',compact('products'));
    }
    public function detail($slug){
        $product = Product::where('slug',$slug)->first();
        $data['products_state']= Product::where('state',1)
        ->orderby('id','desc')->take(4)->get();
        return view('client.product.detail',compact('product'),$data);
    }
}
