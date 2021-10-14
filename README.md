![header](header.png)

# dead-simple-blog

[![img release](https://img.shields.io/github/commit-activity/m/Ooggle/dead-simple-blog.svg?sanitize=true&color=blue)](#)
[![img last commit](https://img.shields.io/github/last-commit/Ooggle/dead-simple-blog.svg)](#)
[![img last release](https://img.shields.io/github/release/Ooggle/dead-simple-blog.svg?color=red)](#)
[![img last release](https://img.shields.io/twitter/follow/Ooggule.svg?style=social)](https://twitter.com/Ooggule)

dead-simple blog template powered by Markdown and PHP

## Installation and usage coming soon...

<br>

## Update guide

### You can use the update.sh script to update your apache2/src/ directory by doing the following (thanks to [@Kevin-Mizu](https://github.com/Kevin-Mizu)):   
(don't forget to change the path in your command)   
```
wget https://raw.githubusercontent.com/Ooggle/dead-simple-blog/master/update.sh && chmod u+x ./update.sh
./update.sh path/to/your/apache2/src/
```

### Manual update (not recommanded)

In order to update the website to the latest version, you need to download the latest release, copy the content of the new `src/apache2/src/` in your own `apache2/src/` directory.

:warning: If you don't want all your work to be lost, don't copy:   
- assets/inc/whoami.php
- .htaccess   
- articles/   
- favicon.png   
- website.conf.php   
- sitemap.json   

New options may be needed in your `website.conf.php` file. Check the release changelog in order to update your configuration file consequently (if you are updating from the upstream git, check the commit messages).
