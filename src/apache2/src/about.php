<?php

include('website.conf.php');
include('assets/inc/utils.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('assets/inc/global_head.php'); ?>
    <title>Whoami | Ooggle</title>
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
            <h2 id="about-me" style="padding-top: 20px">✒ About me.</h2>
            <p>You can write here a description of yourself, the text is automatically stylized using <em>Markdown</em> style.</p>

        </div>
    </div>
    
    <?php include('assets/inc/footer.php'); ?>
    <?php include('assets/inc/global_js.php'); ?>
</body>
</html>