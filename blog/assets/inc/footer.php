<footer id="page-footer" class="page-footer" style="background-color: <?php echo $config['footer_accent_color'] ?>;">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text"><a href="<?php echo $config['rooturl'] ?>"><?php echo $config['long_title'] ?></a></h5>
                <p class="grey-text text-lighten-4"><?php echo $config['longer_description'] ?></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Site map</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $config['rooturl'] ?>">Home</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $config['rooturl'] ?>posts">Posts</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $config['rooturl'] ?>tag">Tags</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $config['rooturl'] ?>whoami">Whoami</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © <span id="current-year">2021</span> <?php echo $config['copyright_name'] ?>
            <a class="grey-text text-lighten-4 right" href="<?php echo $config['rooturl'] ?>licences">licences</a>
        </div>
    </div>
</footer>
<script>
    // display current year
    document.getElementById("current-year").innerHTML = new Date().getFullYear();
</script>
