<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'series_id','series_name','series_status'
    ];
    protected $primaryKey = 'series_id' ;
    protected $table = 'tbl_series';
}
