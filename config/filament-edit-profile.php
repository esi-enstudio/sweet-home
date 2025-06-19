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
            'placeholder' => 'Enter facebook link here', // optional
            'id' => 'facebook', // optional
            'required' => true, // optional
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
