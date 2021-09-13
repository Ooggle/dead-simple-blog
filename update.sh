#!/bin/bash

if [[ $# -ne 1 ]]; then
    echo "Usage : ${0} PATH to apache2/src/"
fi

if [[ -d "${1}" ]]; then
    dest_path="$1"
    tmp_path=$(mktemp -d)

    git clone https://github.com/Ooggle/dead-simple-blog.git $tmp_path
    
    for file in "assets/inc/whoami.php" ".htaccess" "articles" "favicon.png" "website.conf.php" "sitemap.json"
    do
        rm -r "$tmp_path/src/apache2/src/$file"
    done
    
    if ! [[ -d "$dest_path/../src_backup" ]]; then
        mkdir "$dest_path/../src_backup/"
    fi
    backup_name="backup_$(date +"%Y-%m-%d-%H%M%S").tar"
    tar c "$dest_path/" -f "$dest_path/../src_backup/$backup_name"
    (cd "$tmp_path/src/apache2/src/" && tar c .) | (cd "$dest_path" && tar xf -)
    rm -rf "$tmp_path"
else
    echo "Directory does not exist or file selected, exiting..."
fi
