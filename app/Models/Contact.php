<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 */
class Contact extends Model
{
    protected $fillable = [
        'name','email','phone','service_type','message','is_read'
    ];

}
