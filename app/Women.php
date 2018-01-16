<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Women extends Model
{
    protected $table = 'women';
    protected $primaryKey = "CategoryID";
    //public $timestamps = false;
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}