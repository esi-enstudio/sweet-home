<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, true $true)
 */
class Testimonial extends Model
{
    protected $fillable = [
        'client_name','client_designation','client_image','feedback_text','is_published','order_column'
    ];


}


