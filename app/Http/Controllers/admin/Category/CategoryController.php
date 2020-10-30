<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category
    public function index(){
        $data['categories'] = Category::all();
        return view('admin.category.category',$data);
    }
    public function store(CategoryRequest $request){
        $category = new Category;
        $category->parent = $request->parent;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->back()->with('thong-bao','ĐÃ THÊM DANH MỤC THÀNH CÔNG');
    }
    public function edit($id){
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.category.editcategory',compact('category','categories'));
    }
    public function update(CategoryRequest $request,$id){
        $category = Category::find($id);
        $category->parent = $request->parent;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->back()->with('thong-bao','ĐÃ SUA? DANH MỤC THÀNH CÔNG');
    }
}
