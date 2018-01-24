<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}