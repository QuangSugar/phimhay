<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use App\Category;
use App\Option;
use App\Series;
use App\Country;
use App\Movie;
use Illuminate\Support\Facades\Redirect;
session_start();
class MovieController extends Controller
{
    // show form add movie
    public function add_movie()
    {
        $category = Category::orderby('category_id','desc')->get();
        $option = Option::orderby('option_id','desc')->get();
        $series = Series::orderby('series_id','desc')->get();
        $country = Country::orderby('country_id','desc')->get();
        return view('admin.add_movie')->with('category',$category)->with('option',$option)->with('series',$series)->with('country',$country);
    }
    // show form add category movie
    public function add_category_movie()
    {
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $movie = DB::table('tbl_movie')->orderby('movie_id','desc')->limit(1)->get();

        return view('admin.add_category_movie')->with('category',$category)->with('movie',$movie);
    }
    // show form update category movie
    public function update_category_movie($movie_id)
    {
        // $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $movie =DB::table('tbl_movie')->where('movie_id',$movie_id)->first();
        $category = DB::table('tbl_category')->get();
       

        return view('admin.update_category_movie')->with('category',$category)->with('movie',$movie);
    }
    
// event add movie
    public function save_movie(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->movie_name = $data['movie_name'];
        $movie->movie_keywords = $data['movie_keywords'] ;
        $movie->movie_seodes = $data['movie_seodes'] ;
        $movie->movie_seokey =  $data['movie_seokey'];
        $movie->movie_name_en = $data['movie_name_en'];
        $movie->movie_slug =  $data['movie_slug'] ;
        $movie->movie_trailer = $data['movie_trailer'] ;
        $movie->movie_trangthai = $data['movie_trangthai'] ;
        $movie->movie_year = $data['year'] ;
        $movie->movie_time = $data['movie_time'] ;
        $movie->movie_quality = $data['movie_quality'] ;
        $movie->movie_rate = $data['movie_rate'] ;
        $movie->movie_language = $data['movie_language'] ;
        $movie->option_id = $data['option'] ;
        $movie->country_id = $data['country'] ;
        $movie->series_id = $data['series'];
        $movie->movie_view = $data['movie_view'] ;
        $movie->movie_hot = $data['movie_hot'] ;
        $movie->movie_hay = $data['movie_hay'] ;
        $movie->movie_content = $data['movie_content'] ;
        $movie->movie_status = $data['movie_status'];
        $movie->movie_total_eposide = $data['movie_total_eposide'];
  
       

        $get_image = $request->file('movie_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.substr(md5(rand()), 0, 10).rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/movie',$new_image);
            $movie->movie_image = $new_image;
            $movie->save();

       
        return Redirect::to('/add-category-movie');
        }else{
            $movie->movie_image = "";
            $movie->save();
          
            return Redirect::to('/add-category-movie');
        }
       
    }
    public function save_category_movie(Request $request,$movie_id)
    {
       
        $movie = Movie::find($movie_id);
        $data = $request->all();
        $movie->categorys()->attach($data['category']);
           
        
        $request->session()->put('message', 'Thêm phim thành công !');
        return redirect()->back();
    }
    // list movie
    public function all_movie()
    {
        $all_movie = DB::table('tbl_movie')
        ->join('tbl_option','tbl_option.option_name','=','tbl_movie.option_id')
        ->join('tbl_series','tbl_series.series_id','=','tbl_movie.series_id')
        // ->join('tbl_country','tbl_country.country_id','=','tbl_movie.country_id')
        ->orderby('movie_id','desc')->get();
        $category = DB::table('tbl_category_movie')
        ->join('tbl_category','tbl_category.category_id','=','tbl_category_movie.category_id')
        ->orderby('movie_id','desc')->get();
        $manager_movie = view('admin.all_movie')->with('all_movie',$all_movie)->with('category',$category);
        return view('admin_layout')->with('admin.all_movie',$manager_movie);
    }
    // show page update
    public function update_movie($movie_id)
    {
        $movie = Movie::find($movie_id);
        $country = Country::orderby('country_id','desc')->get();
        $category = Category::orderby('category_id','desc')->get();
        $option = Option::orderby('option_id','desc')->get();
        $series = Series::orderby('series_id','desc')->get();
        $manager_movie = view('admin.update_movie')->with('movie',$movie)->with('category',$category)->with('option',$option)->with('series',$series)->with('country',$country);

        return view('admin_layout')->with('admin.update_movie',$manager_movie);
    }
    // event update
    public function edit_movie(Request $request,$movie_id)
    {
        $data = $request->all();
        $movie = Movie::find($movie_id);
        $movie->movie_name = $data['movie_name'];
        $movie->movie_keywords = $data['movie_keywords'] ;
        $movie->movie_seodes = $data['movie_seodes'] ;
        $movie->movie_seokey =  $data['movie_seokey'];
        $movie->movie_name_en = $data['movie_name_en'];
        $movie->movie_slug =  $data['movie_slug'] ;
        $movie->movie_trailer = $data['movie_trailer'] ;
        $movie->movie_trangthai = $data['movie_trangthai'] ;
        $movie->movie_year = $data['year'] ;
        $movie->movie_rate = $data['movie_rate'] ;
        $movie->movie_time = $data['movie_time'] ;
        $movie->movie_quality = $data['movie_quality'] ;
        $movie->movie_language = $data['movie_language'] ;
        $movie->option_id = $data['option'] ;
        $movie->country_id = $data['country'] ;
        $movie->series_id = $data['series'];
        $movie->movie_view = $data['movie_view'] ;
        $movie->movie_hot = $data['movie_hot'] ;
        $movie->movie_hay = $data['movie_hay'] ;
        $movie->movie_content = $data['movie_content'] ;
        $movie->movie_total_eposide = $data['movie_total_eposide'] ;

        $get_image = $request->file('movie_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.substr(md5(rand()), 0, 10).rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/movie',$new_image);
            $movie->movie_image = $new_image;
            $movie->save();

            // $category = DB::table('tbl_category_movie')->where('movie_id',$movie_id)
            // ->join('tbl_category','tbl_category.category_id','=','tbl_category_movie.category_id')
            // ->orderby('movie_id','desc')->get();
            // $value = Category::all();
            // $movie = Movie::find($movie_id);
            
//  
$request->session()->put('message', 'Cập nhật phim thành công !');
           return Redirect::to('/all-movie');
        }else{
            $movie->save();
      
//             $category = DB::table('tbl_category_movie')->where('movie_id',$movie_id)
//             ->join('tbl_category','tbl_category.category_id','=','tbl_category_movie.category_id')
//             ->orderby('movie_id','desc')->get();
//             $value = Category::all();
//             $movie = Movie::find($movie_id);
//  return view('admin.update_category_movie')->with('category',$category)->with('value',$value)->with('movie',$movie);
$request->session()->put('message', 'Cập nhật phim thành công !');
           return Redirect::to('/all-movie');
        }
       
    }
    // event delete movie
    public function delete_movie($movie_id)
    {
        Movie::find($movie_id)->delete();
        Session::put('message', 'Xóa phim thành công !');
 
        return Redirect::to('/all-movie');
    }

    // watch movie
    
    public function watch_movie($movie_slug,$movie_id,$eposide_slug)
    {
        // $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $movie =DB::table('tbl_movie')->where('movie_slug',$movie_slug)->first();
        $category = DB::table('tbl_category')->get();
        $video = DB::table('tbl_eposide')->where('eposide_slug',$eposide_slug)->where('movie_id',$movie_id)->first();
        $data = DB::table('tbl_eposide')
        ->where('movie_id',$movie_id)
        ->orderby('eposide_id','asc')->get();
        // $category = DB::table('tbl_category_movie')
        // ->join('tbl_category','tbl_category.category_id','=','tbl_category_movie.category_id')
        // ->where('movie_id',$movie_id)
        // ->orderby('movie_id','desc')->get();
        $option = Option::orderby('option_id','desc')->get();
        $series = Series::orderby('series_id','desc')->get();
        $country = Country::orderby('country_id','desc')->get();

        return view('pages.watch_movie')->with('category',$category)->with('movie',$movie)->with('option',$option)->with('series',$series)->with('country',$country)->with('data',$data)->with('video',$video);
    }



    // display
    public function unactive_movie($movie_id)
    {
       DB::table('tbl_movie')->where('movie_id',$movie_id)->update(['movie_status' => 0]);
       Session::put('message', 'Ẩn phim thành công !');

       return Redirect::to('/all-movie');
    }
    public function active_movie($movie_id)
    {
        DB::table('tbl_movie')->where('movie_id',$movie_id)->update(['movie_status' => 1]);
        Session::put('message', 'Hiển thị phim thành công !');
 
        return Redirect::to('/all-movie');
    }
}
