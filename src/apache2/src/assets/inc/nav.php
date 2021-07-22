<nav id="top-navbar" style="background-color: <?php echo $config['first_accent_color'] ?>" role="navigation" style="position: sticky; top: 0;">
    <div class="nav-wrapper container">
        <a id="logo-container" href="<?php echo $config['rooturl'] ?>" class="brand-logo">/<?php echo $config['long_title'] ?></a>
        <ul id="nav-actions-ul" class="right hide-on-med-and-down">
            <li id="search-li" style="height: 64px;">
                <form action="<?php echo $config['rooturl'] ?>search">
                    <div class="input-field">
                    <input id="search" name="q" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                    </div>
                </form>
            </li>
            <li><a href="<?php echo $config['rooturl'] ?>tag/new_tag">/new_tag</a></li>
            <li><a href="#" class="dropdown-trigger" data-target="dropdown-profil"><i class="material-icons right">arrow_drop_down</i>/writeups</a></li>
            <li><a href="<?php echo $config['rooturl'] ?>whoami" class="tooltipped" data-position="bottom" data-tooltip="( ͡° ͜ʖ ͡°)">/whoami</a></li>
            <li><a onclick="switch_dark_white()" class="btn-floating waves-effect waves-light transparent"><i id="theme-switch-button" class="material-icons"><?php echo (isset($_COOKIE['dark-mode']) && $_COOKIE['dark-mode'] == 0) ? 'brightness_3' : 'brightness_7' ?></i></a></li>
        </ul>

        <!-- menu de profil -->
        <ul id="dropdown-profil" class="dropdown-content" style="background-color: <?php echo $config['first_accent_color'] ?>">
            <li><a href="<?php echo $config['rooturl'] ?>tag/new_tag">new_tag</a></li>
            <!-- <li class="divider" tabindex="-1"></li> -->
        </ul>
    
        <ul id="nav-mobile" class="sidenav grey darken-4">
            <li style="height: 64px;" class="grey darken-3">
                <form action="<?php echo $config['rooturl'] ?>search">
                    <div class="input-field">
                    <input id="search" name="q" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                    </div>
                </form>
            </li>
            <li><a class="grey-text text-lighten-5" href="<?php echo $config['rooturl'] ?>posts/">/writeups</a></li>
            <li><a class="grey-text text-lighten-5" href="<?php echo $config['rooturl'] ?>tag/new_tag">𑁋 /new_tag</a></li>
            <li><a class="grey-text text-lighten-5" href="<?php echo $config['rooturl'] ?>whoami">/whoami</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons grey-text text-lighten-">menu</i></a>
    </div>
</nav>
<div id="go-to-top-button" class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">keyboard_arrow_up</i>
    </a>
</div>