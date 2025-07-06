<?php

return [
    'avatar_column' => 'avatar_url',
    'disk' => 'public',
    'visibility' => 'public', // or replace by filesystem disk visibility with fallback value

    'show_custom_fields' => true,

    'custom_fields' => [
        'facebook' => [
            'type' => 'text', // required
            'label' => 'Facebook', // required
            'placeholder' => 'Enter facebook profile link here', // optional
            'id' => 'facebook', // optional
            'required' => false, // optional
            'rules' => [], // optional
            'hint_icon' => '', // optional
            'hint' => '', // optional
            'suffix_icon' => '', // optional
            'prefix_icon' => '', // optional
            'default' => '', // optional
            'column_span' => 'full', // optional
            'autocomplete' => false, // optional
        ],

        'instagram' => [
            'type' => 'text', // required
            'label' => 'Instagram', // required
            'placeholder' => 'Enter instagram profile link here', // optional
            'id' => 'instagram', // optional
            'required' => false, // optional
            'rules' => [], // optional
            'hint_icon' => '', // optional
            'hint' => '', // optional
            'suffix_icon' => '', // optional
            'prefix_icon' => '', // optional
            'default' => '', // optional
            'column_span' => 'full', // optional
            'autocomplete' => false, // optional
        ],

        'instagram' => [
            'type' => 'text', // required
            'label' => 'Instagram', // required
            'placeholder' => 'Enter instagram profile link here', // optional
            'id' => 'instagram', // optional
            'required' => false, // optional
            'rules' => [], // optional
            'hint_icon' => '', // optional
            'hint' => '', // optional
            'suffix_icon' => '', // optional
            'prefix_icon' => '', // optional
            'default' => '', // optional
            'column_span' => 'full', // optional
            'autocomplete' => false, // optional
        ],

        'tiktok' => [
            'type' => 'text', // required
            'label' => 'TikTok', // required
            'placeholder' => 'Enter tiktok profile link here', // optional
            'id' => 'tiktok', // optional
            'required' => false, // optional
            'rules' => [], // optional
            'hint_icon' => '', // optional
            'hint' => '', // optional
            'suffix_icon' => '', // optional
            'prefix_icon' => '', // optional
            'default' => '', // optional
            'column_span' => 'full', // optional
            'autocomplete' => false, // optional
        ],

        'youtube' => [
            'type' => 'text', // required
            'label' => 'YouTube', // required
            'placeholder' => 'Enter youtube channel link here', // optional
            'id' => 'youtube', // optional
            'required' => false, // optional
            'rules' => [], // optional
            'hint_icon' => '', // optional
            'hint' => '', // optional
            'suffix_icon' => '', // optional
            'prefix_icon' => '', // optional
            'default' => '', // optional
            'column_span' => 'full', // optional
            'autocomplete' => false, // optional
        ],
    ],
];
