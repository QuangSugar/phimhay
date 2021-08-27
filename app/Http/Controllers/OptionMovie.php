<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use App\Option;
use Illuminate\Support\Facades\Redirect;
session_start();
class OptionMovie extends Controller
{
    public function add_option()
    {
        return view('admin.add_option');
    }
    public function all_option()
    {
        $all_option = Option::all();
        $manager_option = view('admin.all_option')->with('all_option',$all_option);
        return view('admin_layout')->with('admin.all_option',$manager_option);
    }
    public function save_option(Request $request)
    {
        $data = $request->all();
        $option = new Option();
        $option->option_name =  $data['option_name'];
        $option->option_status = $data['option_status'];

        $option->save();

        $request->session()->put('message', 'Thêm loại phim thành công !');
        return Redirect::to('/add-option');
    }
    public function unactive_option($option_id)
    {
       DB::table('tbl_option')->where('option_id',$option_id)->update(['option_status' => 0]);
       Session::put('message', 'Ẩn loại phim thành công !');

       return Redirect::to('/all-option');
    }
    public function active_option($option_id)
    {
        DB::table('tbl_option')->where('option_id',$option_id)->update(['option_status' => 1]);
        Session::put('message', 'Hiển thị loại phim thành công !');
 
        return Redirect::to('/all-option');
    }
    public function update_option($option_id)
    {
        $option = Option::find($option_id);
        $manager_option = view('admin.update_option')->with('option',$option);

        return view('admin_layout')->with('admin.update_option',$manager_option);
    }
    public function edit_option(Request $request,$option_id)
    {
        $data = $request->all();
        $option = Option::find($option_id);
        $option->option_name = $data['option_name'] ;
        $option->save();

        $request->session()->put('message', 'Cập nhật loại phim thành công !');
        return Redirect::to('/all-option');
    }
    public function delete_option($option_id)
    {
        Option::find($option_id)->delete();
        Session::put('message', 'Xóa loại phim thành công !');
 
        return Redirect::to('/all-option');
    }

        // End funtion admin page
        // public function display_product_home($option_id)
        // {
        //     $option = DB::table('tbl_option')->where('option_status',1)->orderby('option_id','desc')->get();
        //     $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();
        //     $option_by_id = DB::table('tbl_product')->join('tbl_option','tbl_product.option_id','=','tbl_option.option_id')->where('tbl_product.option_id',$option_id)->where('tbl_product.product_status',1)->get();
        //     $option_name = DB::table('tbl_option')->where('tbl_option.option_id',$option_id)->limit(1)->get();
        //     return view('pages.option.display_option')->with('option',$option)->with('brand',$brand)->with('option_by_id',$option_by_id)->with('option_name',$option_name);
        // }
}
