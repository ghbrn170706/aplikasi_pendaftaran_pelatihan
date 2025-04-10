<?php

return [
    'show_warnings' => false,

    'options' => [
        'enable_remote' => true,
        'remote' => true,
'temporary_folder' => storage_path('app/public/temp'),
'chroot' => realpath(base_path()),

        'default_paper_size' => 'a4',
    ],


    
];
