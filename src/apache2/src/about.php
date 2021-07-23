<?php

include('website.conf.php');
include('assets/inc/utils.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('assets/inc/global_head.php'); ?>
    <title>Whoami | Ooggle</title>
    <meta property="og:title" content="Whoami">
</head>
<body>
    <?php include('assets/inc/nav.php') ?>
    <nav style="background-color: <?php echo $config['sub_accent_color'] ?>">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="<?php echo $config['rooturl'] ?>" class="breadcrumb"><?php echo $config['long_title'] ?></a>
                    <a href="" class="breadcrumb">whoami</a>
                </div>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="markdown-body container">
            <?php
                include("assets/inc/Parsedown.php");

                $Parsedown = new Parsedown();
            
                $mdfile = fread(fopen('assets/inc/whoami.php', "r"), filesize('assets/inc/whoami.php'));
            
                $mdfile = $Parsedown->text($mdfile);
            
                // replace references to local markdown directory with full path from website root
                $pattern = array();
                $replacement = array();
                $pattern[0] = '/<code class="/';
                $pattern[1] = '/<code>/';
                $replacement[0] = '<code class="prettyprint ';
                $replacement[1] = '<code class="prettyprint">';
                $mdfile = preg_replace($pattern, $replacement, $mdfile);
            
                echo $mdfile;
            ?>
        </div>
    </div>
    
    <?php include('assets/inc/footer.php'); ?>
    <?php include('assets/inc/global_js.php'); ?>
</body>
</html>
