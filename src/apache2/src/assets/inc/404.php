<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('assets/inc/global_head.php'); ?>
    <title>404 Not Found | <?php echo $config['title'] ?></title>
    <meta property="og:title" content="404 Not Found">
</head>
<body>
    <?php include('assets/inc/nav.php') ?>
    <h1 class="theme-font-color" style="text-align: center;">404: Not found</h1>
    <a href="<?php echo $config['rooturl'] ?>"><h2 style="text-align: center;">Return to home</h2></a>
    <?php include('assets/inc/footer.php'); ?>
    <?php include('assets/inc/global_js.php'); ?>
</body>
</html>
