<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="<?php echo $config['rooturl'] ?>favicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo $config['rooturl'] ?>assets/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo $config['rooturl'] ?>assets/css/style.css">
<?php echo (isset($_COOKIE['dark-mode']) && $_COOKIE['dark-mode'] == 0) ? '<link rel="stylesheet" href="' . $config['rooturl'] . 'assets/css/style-white-specific.css" id="theme-style">' : '<link rel="stylesheet" href="' . $config['rooturl'] . 'assets/css/style-dark-specific.css" id="theme-style">' ?>
<?php echo (isset($_COOKIE['dark-mode']) && $_COOKIE['dark-mode'] == 0) ? '<link rel="stylesheet" href="' . $config['rooturl'] . 'assets/css/github-markdown.css" id="markdown-style">' : '<link rel="stylesheet" href="' . $config['rooturl'] . 'assets/css/github-markdown-dark.css" id="markdown-style">' ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['rooturl'] ?>assets/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .markdown-body img{
        <?php echo (isset($config['center_images']) && $config['center_images'] == true) ? 'display: block; margin: auto;' : '' ?>
    }
</style>