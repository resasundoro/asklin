<?php

return [

    // All the sections for the settings page
    'sections' => [
        'app' => [
            'title' => 'General Settings',
            'descriptions' => '',
            'icon' => '',

            'inputs' => [
                ['name' => 'nama_program','type' => 'text','label' => 'Nama Program',],
                ['name' => 'logo_favicon','type' => 'image','label' => 'Favicon','hint' => 'Must be an image and cropped in desired size','rules' => 'image','disk' => 'public','path' => 'app','preview_class' => 'thumbnail','preview_style' => 'height:40px'],
                ['name' => 'desktop_logo','type' => 'image','label' => 'Desktop Logo','hint' => 'Must be an image and cropped in desired size','rules' => 'image','disk' => 'public','path' => 'app','preview_class' => 'thumbnail','preview_style' => 'height:40px'],
                ['name' => 'toggle_logo','type' => 'image','label' => 'Toggle Logo','hint' => 'Must be an image and cropped in desired size','rules' => 'image','disk' => 'public','path' => 'app','preview_class' => 'thumbnail','preview_style' => 'height:40px'],
                ['name' => 'light_logo','type' => 'image','label' => 'Light Logo','hint' => 'Must be an image and cropped in desired size','rules' => 'image','disk' => 'public','path' => 'app','preview_class' => 'thumbnail','preview_style' => 'height:40px'],
                ['name' => 'light_logo1','type' => 'image','label' => 'Light Logo 1','hint' => 'Must be an image and cropped in desired size','rules' => 'image','disk' => 'public','path' => 'app','preview_class' => 'thumbnail','preview_style' => 'height:40px']
            ]
        ]
    ],

    // Setting page url, will be used for get and post request
    'url' => 'settings',

    // Any middleware you want to run on above route
    'middleware' => ['auth'],

    // Route Names
    'route_names' => [
        'index' => 'settings.index',
        'store' => 'settings.store',
    ],
    
    // View settings
    'setting_page_view' => 'settings',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card mb-3',
    'section_heading_class' => 'card-header',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Save',
    'submit_success_message' => 'Pengaturan telah disimpan.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,

    // Controller to show and handle save setting
    'controller' => '\QCod\AppSettings\Controllers\AppSettingController',

    // settings group
    'setting_group' => function() {
        // return 'user_'.auth()->id();
        return 'default';
    }
];
