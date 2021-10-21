<?php

$config = array();

/* website informations */
$config['rooturl'] = 'https://example.com/';
$config['title'] = 'template';
$config['long_title'] = 'template.com';

/* picture displayed on the main page */
$config['profile_picture'] = 'assets/img/kappa.png';
$config['profile_picture_border'] = true;
$config['profile_picture_border_color'] = '';
$config['short_description'] = 'short description template';
$config['longer_description'] = 'longer description template';
$config['copyright_name'] = 'Ooggle';
$config['image_description'] = 'assets/img/kappa.png';

/* center images in posts */
$config['center_images'] = false;

/* navbar menu (you cannot create submenu of submenu) */
$config['navbar'] = array(
    '/new_tag' => 'tag/new_tag',
    '/posts' => [
        '/samples' => 'tag/sample'
    ]
);

/* social link list */
$config['socials'] = array(
	array(
        'image' => 'assets/img/icons/twitter.png',
        'url'   => 'https://twitter.com/'
    ),
    array(
        'image' => 'assets/img/icons/github.png',
        'url'   => 'https://github.com/'
    ),
    array(
        'image' => 'assets/img/icons/rootme.png',
        'url'   => 'https://www.root-me.org/'
    )
);

/* friend list */
$config['friends'] = array(
	array(
        'image' => 'assets/img/kappa.png',
        'url'   => 'https://en.wikipedia.org/wiki/Kappa_(folklore)'
    ),
    array(
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/MET_10_211_1857_O1_sf.jpg/1920px-MET_10_211_1857_O1_sf.jpg',
        'url'   => 'https://en.wikipedia.org/wiki/Kappa_(folklore)'
    )
);


/* to configure the database, run http://website.com/setup */
$config['enable_stats'] = false;

/* db */
$config['db_host'] = 'blogdb';
$config['db_name'] = 'blog';
$config['db_user'] = 'user';
$config['db_password'] = 'password';

/* colors */  
$config['first_accent_color'] = '#212121';
$config['sub_accent_color'] = '#f9a825';
$config['footer_accent_color'] = 'black';

