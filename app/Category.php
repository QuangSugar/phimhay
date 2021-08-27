<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_id','category_slug','category_name','category_status'
    ];
    protected $primaryKey = 'category_id' ;
    protected $table = 'tbl_category';

    public function movie()
    {
        return $this->belongsToMany('App\Movie','tbl_category_movie','category_id','movie_id');
    }
}
