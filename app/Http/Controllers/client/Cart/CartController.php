<?php

namespace App\Http\Controllers\client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function index(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0,'','.');
        return view('client.cart.cart',$data);
    }
    public function checkout(){
        return view('client.cart.checkout');
    }
    public function complete(){
        return view('client.cart.complete');
    }
    public function addcart(Request $request){
        $product = Product::find($request->id_product);
        Cart::add(['id' => $product->code,
        'name' => $product->name,
        'qty' => $request->quantity,
        'price' => $product->price,
        'weight' => 0,
        'options' => ['img' => $product->image]
        ]);
        return redirect()->route('cart.index');
    }
    public function update($rowId, $qty){
        Cart::update( $rowId, $qty);
    }
    public function delete($rowId){
        Cart::remove( $rowId);
        return redirect()->back();
    }
}
