<?php

namespace App\Http\Controllers\admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index(){
        $data['products'] = Product::orderby('id','desc')->paginate(5);
        // $data['products'] = Product::paginate(5)->orderby('id','desc');
        return view('admin.product.listproduct',$data);
    }
    public function create(){
        $categories = Category::all();
        return view('admin.product.addproduct',compact('categories'));
    }
    public function store(AddProductRequest $r){
        $product = new Product;
        $product->code = $r->code;
        $product->name = $r->name;
        $product->slug = Str::slug($r->name,'_');
        $product->price = $r->price;
        $product->featured = $r->featured;
        $product->state = $r->state;
        $product->info = $r->info;
        $product->description = $r->describe;
        $product->categories_id = $r->category;

        if ($r->hasFile('img')) {
            $img = $r->img;
            $img_name = Str::slug($r->name,'_').'.'.$img->getClientOriginalExtension();
            $img->move('assets/upload/image',$img_name);
            $product->image = $img_name ;
        }else{
            $product->image = 'no-img.jpg';
        }

        $product->save();
        return redirect()->route('product.index')->with('thong-bao','Đã thêm sản phẩm thành công');
    }
    public function edit($id){
        $data['product'] = Product::find($id);
        $categories = Category::all();
        return view('admin.product.editproduct',compact('categories'),$data);
    }
    public function update(Request $r,$id){
        $product = Product::find($id);
        $product->code = $r->code;
        $product->name = $r->name;
        $product->slug = Str::slug($r->name,'_');
        $product->price = $r->price;
        $product->featured = $r->featured;
        $product->state = $r->state;
        $product->info = $r->info;
        $product->description = $r->describe;
        $product->categories_id = $r->category;

        if ($r->hasFile('img')) {
            $old_img_name = public_path('assets\upload\image',$product->image);
            if (File::exists($old_img_name)) {
                File::delete($old_img_name);
            }
            $img = $r->img;
            $img_name = Str::slug($r->name,'_').'.'.$img->getClientOriginalExtension();
            $img->move('assets/upload/image',$img_name);
            $product->image = $img_name ;
        }else{
            $product->image = 'no-img.jpg';
        }

        $product->save();
        return redirect()->route('product.index')->with('thong-bao','Đã sửa sản phẩm thành công');
    }
}
