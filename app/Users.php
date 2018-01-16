<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = "UserID";
    public $timestamps = false;
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}