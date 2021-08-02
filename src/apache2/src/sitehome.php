<?php

include('website.conf.php');
include('assets/inc/utils.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('assets/inc/global_head.php'); ?>
    <title><?php echo $config['title'] ?></title>
    <meta property="og:title" content="<?php echo $config['longer_description'] ?>">
    <meta property="og:image" content="<?php echo return_url($config['profile_picture']) ?>">
</head>
<body>
    <?php include('assets/inc/nav.php') ?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div style="width: 250px; margin: auto;">
                    <?php
                        echo '<a href="' . $config['rooturl'] . 'whoami"><img src="' . return_url($config['profile_picture']) . '" alt="' . $config['title'] . '" class="circle responsive-img" style="width: 250px;' .
                        ((isset($config['profile_picture_border']) && $config['profile_picture_border'] == true) ? 'border: solid;' . 
                        ((isset($config['profile_picture_border_color']) && $config['profile_picture_border_color'] != '') ? ' border-color: ' . $config['profile_picture_border_color'] : '') . ''  : '') . '"></a>'
                    ?>
                </div>
                <br>
                <div id="img-social-div" class="icon-section center-align">
                    <?php
                        foreach($config['socials'] as $key => $social)
                        {
                            display_little_icon($social['image'], $social['url']);
                        }
                    ?>
                </div>
                <!-- <h4 class="center theme-font-color">Bio blablabla blablabla blablabla blablabla blablabla blablabla blablabla</h4> -->
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col s12 l8">
                <h3 class="theme-font-color">LATEST POSTS</h3>
                <br>
                <?php
                    $list = get_post_list(5);
                    foreach($list as $key => $post)
                    {
                        display_post_summary($post);
                    }
                ?>
                <a href="<?php echo $config['rooturl'] ?>posts"><h5>VIEW ALL POSTS</h5></a><br>
            </div>
            <div class="col s12 l4">
                <!-- <div class="grey darken-4 z-depth-3" style="padding: 10px; margin-bottom: 20px">
                    <div style="padding: 0 10px;">
                        <h4 class="theme-font-color"><i class="material-icons light-blue-text">announcement</i> Announcement</h4>
                        <hr>
                        <p  class="theme-font-color" style="font-size: 18px;">Hello,<br><br>In case I need it.<br><br><b>Author</b></p>
                    </div>
                </div> -->
                <div class="z-depth-3" style="padding: 10px; margin-bottom: 20px; background-color: <?php echo $config['first_accent_color'] ?>">
                    <div style="padding: 0 10px;">
                        <h4 class="grey-text text-lighten-5">BROWSE BY TAGS</h4>
                        <div class="row">
                        <?php

                            $list = get_tag_list();
                            foreach($list as $key => $tag)
                            {
                                echo '<h6 class="col s12 m6 l12 theme-font-color bolder"><a href="' . $config['rooturl'] . 'tag/' . $tag . '">' . $tag . '</a></h6>';
                            }

                        ?>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="center">
                    <h3 class="theme-font-color">FRIENDS</h3>
                </div>
                <br>
                <div class="icon-section center-align">
                    <?php
                        foreach($config['friends'] as $key => $social)
                        {
                            display_big_icon($social['image'], $social['url']);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('assets/inc/footer.php'); ?>
    <?php include('assets/inc/global_js.php'); ?>
</body>
</html>
