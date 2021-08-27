<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use App\Category;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryMovie extends Controller
{
    public function add_category()
    {
        return view('admin.add_category');
    }
    public function all_category()
    {
        $all_category = Category::orderBy('category_id','DESC')->get();
        $manager_category = view('admin.all_category')->with('all_category',$all_category);
        return view('admin_layout')->with('admin.all_category',$manager_category);
    }
    public function save_category(Request $request)
    {
        $data = $request->all();
        $category =  new Category();
        $category->category_name = $data['category_name'] ;
        $category->category_status = $data['category_status'];
        $category->save();

        $request->session()->put('message', 'Thêm thể loại thành công !');
        return Redirect::to('/add-category');
    }
    public function unactive_category($category_id)
    {
       DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status' => 0]);
       Session::put('message', 'Ẩn thể loại thành công !');

       return Redirect::to('/all-category');
    }
    public function active_category($category_id)
    {
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status' => 1]);
        Session::put('message', 'Hiển thị thể loại thành công !');
 
        return Redirect::to('/all-category');
    }
    public function update_category($category_id)
    {
        $category = Category::find($category_id);
        $manager_category = view('admin.update_category')->with('category',$category);

        return view('admin_layout')->with('admin.update_category',$manager_category);
    }
    public function edit_category(Request $request,$category_id)
    {
        $data = $request->all();
        $category = Category::find($category_id);
        $category->category_name = $data['category_name'] ;
        $category->save();

        $request->session()->put('message', 'Cập nhật thể loại thành công !');
        return Redirect::to('/all-category');
    }
    public function delete_category($category_id)
    {
       Category::find($category_id)->delete();
        Session::put('message', 'Xóa thể loại thành công !');
 
        return Redirect::to('/all-category');
    }

        // End funtion admin page
        // public function display_product_home($category_id)
        // {
        //     $category = DB::table('tbl_category')->where('category_status',1)->orderby('category_id','desc')->get();
        //     $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();
        //     $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')->where('tbl_product.category_id',$category_id)->where('tbl_product.product_status',1)->get();
        //     $category_name = DB::table('tbl_category')->where('tbl_category.category_id',$category_id)->limit(1)->get();
        //     return view('pages.category.display_category')->with('category',$category)->with('brand',$brand)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
        // }
}
