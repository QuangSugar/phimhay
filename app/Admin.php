<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id_admin','admin_name','admin_status'
    ];
    protected $primaryKey = 'admin_id' ;
    protected $table = 'tbl_admin';
}
