<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use App\Category;
use App\Option;
use App\Series;
use App\Movie;
use App\Eposide;
use Illuminate\Support\Facades\Redirect;
session_start();
class EposideController extends Controller
{
    public function manager_eposide($movie_id)
    {
        $movie=Movie::find($movie_id);
        $data = DB::table('tbl_eposide')
        ->where('movie_id',$movie_id)
        ->orderby('eposide_id','desc')->get();
        return view('admin.manager_eposide')->with('data',$data)->with('movie',$movie);
    }
    // public function all_eposide()
    // {
    //     $all_eposide = eposide::all();
    //     $manager_eposide = view('admin.all_eposide')->with('all_eposide',$all_eposide);
    //     return view('admin_layout')->with('admin.all_eposide',$manager_eposide);
    // }
    public function save_eposide(Request $request)
    {
        $data = $request->all();
        $eposide = new Eposide();
        $eposide->eposide_name =  $data['eposide_name'];
        $eposide->eposide_slug =  $data['eposide_slug'];
        $eposide->eposide_video =  $data['eposide_video'];
        $eposide->eposide_status = $data['eposide_status'];
        $eposide->movie_id = $data['movie_id'];

        $eposide->save();

        $request->session()->put('message', 'Thêm tập phim thành công !');
        return redirect()->back();
    }
    public function unactive_eposide($eposide_id)
    {
       DB::table('tbl_eposide')->where('eposide_id',$eposide_id)->update(['eposide_status' => 0]);
       Session::put('message', 'Ẩn tập phim thành công !');

       return redirect()->back();
    }
    public function active_eposide($eposide_id)
    {
        DB::table('tbl_eposide')->where('eposide_id',$eposide_id)->update(['eposide_status' => 1]);
        Session::put('message', 'Hiển thị tập phim thành công !');
 
        return redirect()->back();
    }
    public function update_eposide($eposide_id,$movie_id)
    {
        $eposide = Eposide::find($eposide_id);
        $movie = Movie::find($movie_id);
        $manager_eposide = view('admin.update_eposide')->with('eposide',$eposide)->with('movie',$movie);

        return view('admin_layout')->with('admin.update_eposide',$manager_eposide);
    }
    public function edit_eposide(Request $request,$eposide_id)
    {
        $data = $request->all();
        $eposide = Eposide::find($eposide_id);
        $eposide->eposide_name = $data['eposide_name'] ;
        $eposide->eposide_slug = $data['eposide_slug'] ;
        $eposide->eposide_video = $data['eposide_video'] ;
        $eposide->save();

        $request->session()->put('message', 'Cập nhật tập phim thành công !');
        return redirect()->back();
    }
    public function delete_eposide($eposide_id)
    {
        eposide::find($eposide_id)->delete();
        Session::put('message', 'Xóa tập phim thành công !');
 
        return redirect()->back();
    }

        // End funtion admin page
        // public function display_product_home($eposide_id)
        // {
        //     $eposide = DB::table('tbl_eposide')->where('eposide_status',1)->orderby('eposide_id','desc')->get();
        //     $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();
        //     $eposide_by_id = DB::table('tbl_product')->join('tbl_eposide','tbl_product.eposide_id','=','tbl_eposide.eposide_id')->where('tbl_product.eposide_id',$eposide_id)->where('tbl_product.product_status',1)->get();
        //     $eposide_name = DB::table('tbl_eposide')->where('tbl_eposide.eposide_id',$eposide_id)->limit(1)->get();
        //     return view('pages.eposide.display_eposide')->with('eposide',$eposide)->with('brand',$brand)->with('eposide_by_id',$eposide_by_id)->with('eposide_name',$eposide_name);
        // }
}
