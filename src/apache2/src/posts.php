<?php

include('website.conf.php');
include('assets/inc/utils.php');

/* check for valid search query */
$q = '';
$type = '';
if(isset($_GET['q']) && $_GET['q'] !== '')
{
    $q = $_GET['q'];
    $type = 'query';
}
elseif(isset($_GET['tag']) && $_GET['tag'] !== '')
{
    $q = $_GET['tag'];
    $type = 'tag';
}
elseif(isset($_GET['all']) && $_GET['all'] !== '')
{
    $type = 'all';
}

// sanitize query
$q = htmlspecialchars(strip_tags($q));

$final_post_list = array();

switch ($type) {
    case 'query':
        $post_list = get_post_list();
        foreach($post_list as $key => $post)
        {
            if(strpos(strtoupper($post->title), strtoupper($q)) !== false)
            {
                array_push($final_post_list, $post);
            }
        }
        break;
    
    case 'tag':
        $post_list = get_post_list();
        foreach($post_list as $key => $post)
        {
            $is_ok = true;
            foreach(explode(' ', $q) as $key => $tag)
            {
                if(!in_array($tag, $post->tags) && $tag !== '')
                {
                    $is_ok = false;
                    break;
                }
            }

            if($is_ok)
            {
                array_push($final_post_list, $post);
            }
        }
        break;

    case 'all':
        $post_list = get_post_list();
        foreach($post_list as $key => $post)
        {
            array_push($final_post_list, $post);
        }
        break;

    default:
        break;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('assets/inc/global_head.php'); ?>
    <?php
        switch ($type) {
            case 'query':
                echo '<title>Search: ' . $q . ' | ' . $config['title'] . '</title>';
                echo '<meta property="og:title" content="Search: ' . $q . '">';
                break;
            
            case 'tag':
                echo '<title>' . $q . ' | ' . $config['title'] . '</title>';
                echo '<meta property="og:title" content="Tag: ' . $q . '">';
                break;

            case 'all':
                echo '<title>All posts | ' . $config['title'] . '</title>';
                echo '<meta property="og:title" content="All posts">';
                break;
        }
    ?>
</head>
<body>
    <?php include('assets/inc/nav.php') ?>
    <nav style="background-color: <?php echo $config['sub_accent_color'] ?>">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="<?php echo $config['rooturl'] ?>" class="breadcrumb"><?php echo $config['long_title'] ?></a>
                    <?php
                        switch ($type) {
                            case 'query':
                                echo '<a href="' . $config['rooturl'] . 'posts/" class="breadcrumb">search</a>';
                                echo '<a href="" class="breadcrumb">' . $q . '</a>';
                                break;
                            
                            case 'tag':
                                echo '<a href="' . $config['rooturl'] . 'tag/" class="breadcrumb">tag</a>';
                                echo '<a href="" class="breadcrumb">' . $q . '</a>';
                                break;

                            case 'all':
                                echo '<a href="' . $config['rooturl'] . 'posts/" class="breadcrumb">posts</a>';
                                break;
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="row container">
        <div class="col s12">
            <?php

                switch ($type) {
                    case 'query':
                        echo '<h3 class="theme-font-color">Results for ' . $q . '</h3>';
                        echo '<h5 class="theme-font-color">' . count($final_post_list) . ' results</h5>';
                        echo '<br><br>';
                        foreach($final_post_list as $key => $post)
                        {
                            display_post_summary($post);
                        }
                        break;
                    
                    case 'tag':
                        echo '<h3 class="theme-font-color">Tag: ' . $q . '</h3><br>';
                        echo '<h5 class="theme-font-color">' . count($final_post_list) . ' results</h5>';
                        echo '<br><br>';
                        echo '<br><br>';
                        foreach($final_post_list as $key => $post)
                        {
                            display_post_summary($post);
                        }
                        break;

                    case 'all':
                        echo '<h3 class="theme-font-color">All posts</h3><br>';
                        echo '<h5 class="theme-font-color">' . count($final_post_list) . ' results</h5>';
                        echo '<br><br>';
                        foreach($final_post_list as $key => $post)
                        {
                            display_post_summary($post);
                        }
                        break;

                    default:
                        break;
                }

                // in case of empty query
                if($type === '')
                {
                    if(isset($_GET['tag']))
                    {
                        ?>
                        <div class="col s12">
                            <div class="z-depth-3" style="padding: 10px; margin-bottom: 20px; background-color: <?php echo $config['first_accent_color'] ?>">
                                <div style="padding: 0 10px;">
                                    <h4 class="grey-text text-lighten-5">EVERY TAGS</h4>
                                    <div class="row">
                                    <?php
            
                                        $list = get_tag_list();
                                        foreach($list as $key => $tag)
                                        {
                                            echo '<h6 class="col s12 m6 l4 xl3 theme-font-color"><a href="' . $config['rooturl'] . 'tag/' . $tag . '">' . $tag . '</a></h6>';
                                        }
            
                                    ?>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    elseif(isset($_GET['q']))
                    {
                        echo '<h3 class="theme-font-color">Start by typing something in the search box.</h3>';
                    }
                }
                
            ?>
        </div>
    </div>
    <?php include('assets/inc/footer.php'); ?>
    <?php include('assets/inc/global_js.php'); ?>
    
</body>
</html>