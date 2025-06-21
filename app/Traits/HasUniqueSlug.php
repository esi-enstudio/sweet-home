<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUniqueSlug
{
    /**
     * Boot the trait.
     * এটি স্বয়ংক্রিয়ভাবে মডেলের 'creating' এবং 'updating' ইভেন্টে লিসেন করবে।
     */
    protected static function bootHasUniqueSlug(): void
    {
        static::creating(function (Model $model) {
            // যদি মডেলটিতে getSluggableField() মেথডটি থাকে
            if (method_exists($model, 'getSluggableField')) {
                $sourceField = $model->getSluggableField();

                // যদি slug খালি থাকে এবং সোর্স ফিল্ডে ভ্যালু থাকে
                if (empty($model->slug) && !empty($model->{$sourceField})) {
                    $model->slug = static::generateUniqueSlug($model->{$sourceField});
                }
            }
        });

        static::updating(function (Model $model) {
            if (method_exists($model, 'getSluggableField')) {
                $sourceField = $model->getSluggableField();

                // যদি সোর্স ফিল্ডটি পরিবর্তন হয়ে থাকে
                if ($model->isDirty($sourceField)) {
                    $model->slug = static::generateUniqueSlug($model->{$sourceField}, $model->id);
                }
            }
        });
    }

    /**
     * Generate a unique slug from a source string.
     *
     * @param string $source The string to generate a slug from.
     * @param int|null $exceptId The ID of the current model to exclude from the check.
     * @return string The unique slug.
     */
    protected static function generateUniqueSlug(string $source, int $exceptId = null): string
    {
        $slug = Str::slug($source);
        $originalSlug = $slug;
        $count = 1;

        // while লুপ চালিয়ে ইউনিক স্লাগ নিশ্চিত করা
        while (static::where('slug', $slug)->when($exceptId, fn($query) => $query->where('id', '!=', $exceptId))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    /**
     * Get the field name that should be used for generating the slug.
     * মডেলগুলোতে এই মেথডটি ইমপ্লিমেন্ট করতে হবে।
     *
     * @return string
     */
    // abstract public function getSluggableField(): string;
    // abstract ব্যবহার করলে মডেলগুলোতে এই মেথডটি অবশ্যই ইমপ্লিমেন্ট করতে হবে, যা ভালো অভ্যাস।
    // তবে সহজ রাখার জন্য আমরা method_exists() দিয়ে চেক করছি।
}
