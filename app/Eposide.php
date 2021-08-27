<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eposide extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'eposide_id','eposide_name','eposide_slug','eposide_video','eposide_status'
    ];
    protected $primaryKey = 'eposide_id' ;
    protected $table = 'tbl_eposide';

}
