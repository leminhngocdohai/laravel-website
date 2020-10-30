<?php

namespace App\Http\Controllers\admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index(){
        $data['orders'] = Order::where('state','1')->paginate(2);
        return view('admin.order.order',$data);
    }
    public function detail($id){
        $order = Order::find($id);
        return view('admin.order.detailorder',compact('order'));
    }
    public function update($id){
        $order = Order::find($id);
        $order->state = 2;
        $order->save();
        return redirect()->route('order.processed');
    }
    public function processed(){
        $data['orders'] = Order::where('state','2')->orderby('id','desc')->paginate(2);
        return view('admin.order.processed',$data);
    }
}
