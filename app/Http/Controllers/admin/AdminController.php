<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $current_month = $now->format('m');
        $current_year = $now->format('Y');
        for ($i=1; $i < $current_month; $i++) {
            $arr['Tháng '.$i] = Order::where('state','2')
            ->whereMonth('updated_at',$i)
            ->whereYear('updated_at',$current_year)
            ->sum('total');
        }
        $data['chartData']= $arr;

        return view('admin.index',$data);
    }
    
}
