<?php

return [

    /**
     * This is the default theme.
     * It is the last resort to look for files that aren't found elsewhere.
     */
    'default' => 'master',

    /**
     * The theme to be used can be set during runtime, but also here.
     */
    //'theme' => '',

    /**
     * Should the current theme path be cached?
     * If so, it will be cached until the Laravel cache is flushed.
     */
    'cache' => true,

    /**
     * These are the locations where you place your theme files and assets.
     */
    'locations' => [
        'themes' => resource_path('themes'),
        'assets' => resource_path('assets/themes'),
    ],

];