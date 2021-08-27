<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Movie extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'movie_id','movie_name','movie_keywords','movie_seodes','movie_seokey','movie_name_en','movie_slug','	movie_trailer','movie_image','movie_image2','movie_content','movie_time','movie_year'
        ,'series_id','movie_quality','movie_language','option_id','country_id','movie_view','movie_hot','movie_hay','movie_status','movie_total_eposide'
    ];
    protected $primaryKey = 'movie_id' ;
    protected $table = 'tbl_movie';

    public function categorys()
    {
        return $this->belongsToMany('App\Category','tbl_category_movie','movie_id','category_id');
    }
}
