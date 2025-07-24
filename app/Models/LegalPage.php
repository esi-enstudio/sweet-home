<?php

namespace App\Models;

use App\Traits\HasCustomSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalPage extends Model
{
    use HasFactory, HasCustomSlug;

    protected $fillable = ['title', 'slug', 'content', 'meta_title', 'meta_description', 'is_published'];

    protected $casts = ['is_published' => 'boolean'];

    public function getSluggableField(): string
    {
        return 'title';
    }
}
