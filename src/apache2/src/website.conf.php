<?php

$config = array();

/* website informations */
$config['title'] = 'template';
$config['long_title'] = 'template.com';

/* picture displayed on the main page */
$config['profile_picture'] = 'assets/img/kappa.png';
$config['short_description'] = 'short description template';
$config['longer_description'] = 'longer description template';
$config['copyright_name'] = 'Ooggle';
$config['image_description'] = 'assets/img/kappa.png';
$config['rooturl'] = 'http://localhost/blog-template/apache2/src/';

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
$config['db_host'] = 'localhost';
$config['db_name'] = 'name';
$config['db_user'] = 'user';
$config['db_password'] = 'password';

/* colors */  
$config['first_accent_color'] = '#212121';
$config['sub_accent_color'] = '#f9a825';
$config['footer_accent_color'] = 'black';

