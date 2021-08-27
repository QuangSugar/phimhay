<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use App\Series;
use Illuminate\Support\Facades\Redirect;
session_start();
class SeriesController extends Controller
{
    public function add_series()
    {
        return view('admin.add_series');
    }
    public function all_series()
    {
        // $all_series = DB::table('tbl_series')->get();
        $all_series = Series::orderBy('series_id','DESC')->get();
        $manager_series = view('admin.all_series')->with('all_series',$all_series);
        return view('admin_layout')->with('admin.all_series',$manager_series);
    }
    public function save_series(Request $request)
    {
        $data = $request->all();
        $series = new Series();
        $series->series_name = $data['series_name'];
        $series->series_status = $data['series_status'];
        $series->save();
        // $data = array();
        // $data['series_name'] = $request->series_name;
        // $data['series_status'] = $request->series_status;

        // DB::table('tbl_series')->insert($data);

        $request->session()->put('message', 'Thêm series thành công !');
        return Redirect::to('/add-series');
    }
    public function unactive_series($series_id)
    {
       DB::table('tbl_series')->where('series_id',$series_id)->update(['series_status' => 0]);
       Session::put('message', 'Ẩn series thành công !');

       return Redirect::to('/all-series');
    }
    public function active_series($series_id)
    {
        DB::table('tbl_series')->where('series_id',$series_id)->update(['series_status' => 1]);
        Session::put('message', 'Hiển thị series thành công !');
 
        return Redirect::to('/all-series');
    }
    public function update_series($series_id)
    {
        $series = Series::find($series_id);
        $manager_series = view('admin.update_series')->with('series',$series);

        return view('admin_layout')->with('admin.update_series',$manager_series);
    }
    public function edit_series(Request $request,$series_id)
    {
        $data = $request->all();
        $series = Series::find($series_id);
        $series->series_name = $data['series_name'];
        $series->save();

        $request->session()->put('message', 'Cập nhật series thành công !');
        return Redirect::to('/all-series');
    }
    public function delete_series($series_id)
    {
       Series::find($series_id)->delete();
        Session::put('message', 'Xóa series thành công !');
 
        return Redirect::to('/all-series');
    }

        // End funtion admin page
        // public function display_product_home($series_id)
        // {
        //     $series = DB::table('tbl_series')->where('series_status',1)->orderby('series_id','desc')->get();
        //     $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();
        //     $series_by_id = DB::table('tbl_product')->join('tbl_series','tbl_product.series_id','=','tbl_series.series_id')->where('tbl_product.series_id',$series_id)->where('tbl_product.product_status',1)->get();
        //     $series_name = DB::table('tbl_series')->where('tbl_series.series_id',$series_id)->limit(1)->get();
        //     return view('pages.series.display_series')->with('series',$series)->with('brand',$brand)->with('series_by_id',$series_by_id)->with('series_name',$series_name);
        // }
}
