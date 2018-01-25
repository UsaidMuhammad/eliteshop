<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousel';
    protected $primaryKey = "CarouselID";
    const CREATED_AT = 'DateAdded';
    const UPDATED_AT = 'DateModified';
}