<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use App\Category;
use App\Option;
use App\Country;
use App\Series;
use App\Movie;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
 public function index()
 {
    $category = Category::orderby('category_id','desc')->where('category_status',1)->get();
    $option = Option::orderby('option_id','desc')->where('option_status',1)->get();
    $country = Country::orderby('country_id','desc')->where('country_status',1)->get();
    $series = Series::orderby('series_id','desc')->where('series_status',1)->get();
    $movie = Movie::orderBy('movie_year','desc')->where('movie_status',1)->limit(12)->get();
     return view('pages.home')->with('category',$category)->with('option',$option)->with('series',$series)->with('movie',$movie)->with('country',$country);
 }
 public function display_movie_by_category($category_slug)
 {
    $category = Category::orderby('category_id','desc')->where('category_status',1)->get();
    $series = Series::orderby('series_id','desc')->where('series_status',1)->get();
    $option = Option::orderby('option_id','desc')->where('option_status',1)->get();
    $country = Country::orderby('country_id','desc')->where('country_status',1)->get();
    $title = DB::table('tbl_category')->where('category_slug',$category_slug)->first();
     $movie = DB::table('tbl_category_movie')
     ->join('tbl_category','tbl_category.category_id','=','tbl_category_movie.category_id')
     ->join('tbl_movie','tbl_movie.movie_id','=','tbl_category_movie.movie_id')
     ->where('category_slug',$category_slug)
     ->orderby('movie_year','desc')->get();
     return view('pages.display_movie_by_category')->with('category',$category)->with('option',$option)->with('series',$series)->with('movie',$movie)->with('country',$country)->with('title',$title);
 }
}
