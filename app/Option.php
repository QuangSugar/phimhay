<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'option_id','option_name','option_status'
    ];
    protected $primaryKey = 'option_id' ;
    protected $table = 'tbl_option';
}
