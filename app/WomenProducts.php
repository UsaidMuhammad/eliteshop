<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WomenProducts extends Model
{
    protected $table = 'women_products';
    protected $primaryKey = "ProductID";
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}