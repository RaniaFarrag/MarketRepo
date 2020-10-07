<?php
return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'author' => '',
    'subject' => '',
    'keywords' => '',
    'creator' => 'Laravel Pdf',
    'display_mode' => 'fullpage',
    'tempDir' => base_path('../temp/'),
    'font_path' => base_path('resources/fonts/'),
    'font_data' => [
        'examplefont' => [
            'R' => 'DroidKufi-Regular.ttf',    // regular font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'examplefont3' => [
            'R' => 'duCo_WHeadline16_Lt.ttf',    // regular font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'examplefont2' => [
            'R' => 'DejaVuSans.ttf',    // regular font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ]
        // ...add as many as you want.
    ]
];