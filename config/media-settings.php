<?php

return [
    'dimensions' => [
        'thumbnail' => [
            'width' => env('MEDIA_THUMBNAIL_WIDTH', 283),
            'height' => env('MEDIA_THUMBNAIL_HEIGHT', 217),
        ],
        'gallery' => [
            'width' => env('MEDIA_GALLERY_WIDTH', 1003),
            'height' => env('MEDIA_GALLERY_HEIGHT', 530),
        ],
        'hero' => [
            'width' => env('MEDIA_HERO_WIDTH', 724),
            'height' => env('MEDIA_HERO_HEIGHT', 546),
        ],
        'showcase' => [
            'width' => env('MEDIA_SHOWCASE_WIDTH', 540),
            'height' => env('MEDIA_SHOWCASE_HEIGHT', 573),
        ],
        'spotlight' => [
            'width' => env('MEDIA_SPOTLIGHT_WIDTH', 574),
            'height' => env('MEDIA_SPOTLIGHT_HEIGHT', 722),
        ],
        'inspiration' => [
            'width' => env('MEDIA_INSPIRATION_WIDTH', 368),
            'height' => env('MEDIA_INSPIRATION_HEIGHT', 368),
        ],
        'post_thumbnail' => [
            'width' => env('MEDIA_POST_THUMBNAIL_WIDTH', 800),
            'height' => env('MEDIA_POST_THUMBNAIL_HEIGHT', 478),
        ],
        'default' => [
            'width' => env('MEDIA_DEFAULT_WIDTH', 1200),
            'height' => env('MEDIA_DEFAULT_HEIGHT', null),
        ],
    ],
];
