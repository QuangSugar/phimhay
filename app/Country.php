<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'country_id','country_name','country_status','country_slug'
    ];
    protected $primaryKey = 'country_id' ;
    protected $table = 'tbl_country';
}
