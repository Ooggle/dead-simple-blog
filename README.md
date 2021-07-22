# dead-simple-blog
dead-simple blog template powered by Markdown and PHP

## Installation and usage comming soon...

<br>

## Update guide

### You can use the update.sh script to update your apache2/src/ directory by doing the following (thanks to @Kevin-Mizu):   
(don't forget to change the path in your command)   
```
wget https://raw.githubusercontent.com/Ooggle/dead-simple-blog/master/update.sh
chmod u+x ./update.sh
./update.sh path/to/apache2/src/
```

In order to update the website to the latest version, you need to download the latest release, copy the content of the new `src/apache2/src/` in your own `apache2/src/` directory.

:warning: If you don't want all your work to be lost, don't copy:   
- .htaccess   
- articles/   
- favicon.png   
- website.conf.php   
- sitemap.json   

New options may be needed in your `website.conf.php` file. Check the release changelog in order to update your configuration file consequently (if you are updating from the upstream git, check the commit messages).
