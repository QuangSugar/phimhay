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
class DetailMovieController extends Controller
{
    // Show deatails page

    public function display_detail($movie_id)
    {
        $movie = Movie::find($movie_id);
        $category_movie = DB::table('tbl_category_movie')
        ->join('tbl_category','tbl_category.category_id','=','tbl_category_movie.category_id')
        ->where('movie_id',$movie_id)
        ->orderby('movie_id','desc')->get();
        $category = Category::orderby('category_id','desc')->get();
        $option = Option::orderby('option_id','desc')->get();
        $series = Series::orderby('series_id','desc')->get();
        $country = Country::orderby('country_id','desc')->get();
        $category_slug = $category_movie[0]->category_slug;
        $movie_related = DB::table('tbl_category_movie')
        ->join('tbl_category','tbl_category.category_id','=','tbl_category_movie.category_id')
        ->join('tbl_movie','tbl_movie.movie_id','=','tbl_category_movie.movie_id')
        ->where('category_slug',$category_slug)
        ->orderby('movie_year','desc')->limit(8)->get();
        return view('pages.detail_movie')->with('category',$category)->with('option',$option)->with('series',$series)->with('country',$country)->with('movie',$movie)->with('category_movie',$category_movie)->with('movie_related',$movie_related);
    }
}
