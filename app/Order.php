<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = "OrderID";
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}