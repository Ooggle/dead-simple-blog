<?php

include('website.conf.php');
include('assets/inc/utils.php');


if(isset($_GET['file']) && $_GET['file'] != '')
{
    // parse sitemap
    $previousPost = '-1';
    $selectedPost = '-1';
    $followingPost = '-1';
    $sitemap = json_decode(fread(fopen("sitemap.json", "r"), filesize("sitemap.json")));
    foreach ($sitemap->posts as $key => $post) {
        if($_GET['file'] === $post->url)
        {
            if(isset($sitemap->posts[$key - 1])) {
                $previousPost = $sitemap->posts[$key - 1];
            }

            $selectedPost = $post;

            if(isset($sitemap->posts[$key + 1])) {
                $followingPost = $sitemap->posts[$key + 1];
            } 
        }
    }
    //print_r($selectedPost);

    if($selectedPost != '-1')
    {
        // nice
    }
    else
    {
        return_404();
    }
}
else
{
    return_404();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('assets/inc/global_head.php'); ?>
    <title><?php echo $selectedPost->title ?> | <?php echo $config['title'] ?></title>
</head>
<body>
    <?php include('assets/inc/nav.php') ?>
    <nav style="background-color: <?php echo $config['sub_accent_color'] ?>">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="<?php echo $config['rooturl'] ?>" class="breadcrumb"><?php echo $config['long_title'] ?></a>
                    <a href="<?php echo $config['rooturl'] ?>posts/" class="breadcrumb">post</a>
                    <a href="" class="breadcrumb"><?php echo $selectedPost->title ?></a>
                </div>
            </div>
        </div>
    </nav>
    <br><br>
    <?php

    echo '<div class="markdown-body container">';
    include("assets/inc/Parsedown.php");

    $Parsedown = new Parsedown();

    $mdfile = fread(fopen($selectedPost->file, "r"), filesize($selectedPost->file));

    $mdfile = $Parsedown->text($mdfile);

    // replace references to local markdown directory with full path from website root
    $pattern = array();
    $replacement = array();
    $pattern[0] = '/src="((.)+)" /';
    $pattern[1] = '/a href="files\/((.)+)">/';
    $pattern[2] = '/<code class="/';
    $pattern[3] = '/<code>/';
    $replacement[0] = 'src="' . $config['rooturl'] . $selectedPost->dir . '$1"';
    $replacement[1] = 'a href="' . $config['rooturl'] . $selectedPost->dir . 'files/$1">';
    $replacement[2] = '<code class="prettyprint ';
    $replacement[3] = '<code class="prettyprint">';
    $mdfile = preg_replace($pattern, $replacement, $mdfile);

    //$pattern = '/<\/summary>((.\n?)+)<\/details>/mg';



    echo $mdfile;

    echo '</div>';
    
    ?>
    <br>
    <div class="grey darken-4">
        <div class="row container" style="margin-bottom: 0;">
            <div class="col s12 m6">
                <?php
                    echo $previousPost !== '-1' ? '<a href="' . $config['rooturl'] . 'post/' . $previousPost->url . '" class="breadcrumb"><p><i class="material-icons left">keyboard_arrow_left</i> ' . $previousPost->title . '</p></a>': '';
                ?>
            </div>
            <div class="col s12 m6 right-align">
                <?php
                    echo $followingPost !== '-1' ? '<a href="' . $config['rooturl'] . 'post/' . $followingPost->url . '" class="breadcrumb"><p>' . $followingPost->title . ' <i class="material-icons right">keyboard_arrow_right</i></p></a>': '';
                ?>
            </div>
        </div>
    </div>
    <?php include('assets/inc/footer.php'); ?>
    <?php include('assets/inc/global_js.php'); ?>
</body>
</html>