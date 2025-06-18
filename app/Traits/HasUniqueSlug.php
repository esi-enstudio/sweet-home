<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUniqueSlug
{
    protected static function bootHasUniqueSlug(): void
    {
        static::creating(function (Model $model) {
            if (empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->name);
            }
        });

        static::updating(function (Model $model) {
            // সোর্স ফিল্ড (যেমন 'name') পরিবর্তন হলেই শুধু স্লাগ আপডেট হবে
            $sluggableField = 'name'; // অথবা 'title'
            if ($model->isDirty($sluggableField)) {
                $model->slug = static::generateUniqueSlug($model->{$sluggableField}, $model->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $source, int $exceptId = null): string
    {
        $slug = Str::slug($source);
        $originalSlug = $slug;
        $count = 1;

        $query = static::where('slug', $slug);

        if ($exceptId) {
            $query->where('id', '!=', $exceptId);
        }

        while ($query->exists()) {
            $slug = $originalSlug . '-' . $count++;
            // নতুন স্লাগের জন্য কুয়েরি আবার সেট করতে হবে
            $query = static::where('slug', $slug);
            if ($exceptId) {
                $query->where('id', '!=', $exceptId);
            }
        }

        return $slug;
    }
}
