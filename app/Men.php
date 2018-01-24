<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Men extends Model
{
    protected $table = 'men';
    protected $primaryKey = "CategoryID";
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}