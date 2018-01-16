<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenProducts extends Model
{
    protected $table = 'men_products';
    protected $primaryKey = "ProductID";
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}