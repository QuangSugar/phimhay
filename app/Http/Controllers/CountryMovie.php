<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use App\country;
use Illuminate\Support\Facades\Redirect;
session_start();
class CountryMovie extends Controller
{
    public function add_country()
    {
        return view('admin.add_country');
    }
    public function all_country()
    {
        $all_country = country::orderBy('country_id','DESC')->get();
        $manager_country = view('admin.all_country')->with('all_country',$all_country);
        return view('admin_layout')->with('admin.all_country',$manager_country);
    }
    public function save_country(Request $request)
    {
        $data = $request->all();
        $country =  new country();
        $country->country_name = $data['country_name'] ;
        $country->country_status = $data['country_status'];
        $country->save();

        $request->session()->put('message', 'Thêm quốc gia thành công !');
        return Redirect::to('/add-country');
    }
    public function unactive_country($country_id)
    {
       DB::table('tbl_country')->where('country_id',$country_id)->update(['country_status' => 0]);
       Session::put('message', 'Ẩn quốc gia thành công !');

       return Redirect::to('/all-country');
    }
    public function active_country($country_id)
    {
        DB::table('tbl_country')->where('country_id',$country_id)->update(['country_status' => 1]);
        Session::put('message', 'Hiển thị quốc gia thành công !');
 
        return Redirect::to('/all-country');
    }
    public function update_country($country_id)
    {
        $country = country::find($country_id);
        $manager_country = view('admin.update_country')->with('country',$country);

        return view('admin_layout')->with('admin.update_country',$manager_country);
    }
    public function edit_country(Request $request,$country_id)
    {
        $data = $request->all();
        $country = country::find($country_id);
        $country->country_name = $data['country_name'] ;
        $country->save();

        $request->session()->put('message', 'Cập nhật quốc gia thành công !');
        return Redirect::to('/all-country');
    }
    public function delete_country($country_id)
    {
       country::find($country_id)->delete();
        Session::put('message', 'Xóa quốc gia thành công !');
 
        return Redirect::to('/all-country');
    }

        // End funtion admin page
        // public function display_product_home($country_id)
        // {
        //     $country = DB::table('tbl_country')->where('country_status',1)->orderby('country_id','desc')->get();
        //     $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();
        //     $country_by_id = DB::table('tbl_product')->join('tbl_country','tbl_product.country_id','=','tbl_country.country_id')->where('tbl_product.country_id',$country_id)->where('tbl_product.product_status',1)->get();
        //     $country_name = DB::table('tbl_country')->where('tbl_country.country_id',$country_id)->limit(1)->get();
        //     return view('pages.country.display_country')->with('country',$country)->with('brand',$brand)->with('country_by_id',$country_by_id)->with('country_name',$country_name);
        // }
}
