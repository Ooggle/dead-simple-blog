<?php

function return_404()
{
    global $config;
    http_response_code(404);
    include('assets/inc/404.php');
    die();
}

function get_post_list($count = -1)
{
    $i = $count;
    $list = array();

    // parse sitemap
    try
    {
        $sitemap = json_decode(fread(fopen("sitemap.json", "r"), filesize("sitemap.json")));
        if($sitemap != NULL)
        {
            foreach($sitemap->posts as $key => $post)
            {
                if($count !== -1 && $i == 0)
                {
                    break;
                }
                if(!(isset($post->hidden) && $post->hidden == true))
                {
                    array_push($list, $post);
                    $i -= 1;
                }
            }
        }
        else
        {
            echo '<h4 class="theme-font-color">The sitemap.json file contains errors.</h4>';
        }
    }
    catch(exception $e)
    {
        echo '<h4 class="theme-font-color">The sitemap.json file contains errors.</h4>';
    }

    return $list;
}

function get_tag_list($unique_post = '0')
{
    $list = array();

    // parse sitemap
    $posts = get_post_list();
    if($unique_post !== '0')
    {
        foreach($posts as $key => $post)
        {
            if($post->url === $unique_post)
            {
                foreach($post->tags as $key => $tag)
                {
                    array_push($list, $tag);
                }
                break;
            }
        }
    }
    else
    {
        foreach($posts as $key => $post)
        {
            foreach($post->tags as $key => $tag)
            {
                if(array_search($tag, $list, true) === false)
                {
                    array_push($list, $tag);
                }
            }
        }
    }

    return $list;
}

function display_post_summary($post)
{
    global $config;
    echo '<a href="' . $config['rooturl'] . 'post/' . $post->url . '"><h5>' . $post->title . '</h5></a>';
    echo '<p class="theme-font-color"><i class="tiny material-icons">date_range</i> date: ' . date("M d, Y", strtotime($post->date)) . '</p>';
    echo '<p class="theme-font-color">';
    foreach($post->tags as $key => $tag)
    {
        if($key === 0)
        {
            echo '<a href="' . $config['rooturl'] . 'tag/' . $tag . '">' . $tag . '</a>';
        }
        else
        {
            echo ' - ' . '<a href="' . $config['rooturl'] . 'tag/' . $tag . '">' . $tag . '</a>';
        }
    }
    echo '</p>';
    echo '<br><hr><br>';
}

function return_url($link)
{
    global $config;
    if(filter_var($link, FILTER_VALIDATE_URL) !== false)
    {
        return $link;
    }
    else
    {
        return $config['rooturl'] . $link;
    }
}

function return_target_blank_if_external($link)
{
    if(filter_var($link, FILTER_VALIDATE_URL) !== false)
    {
        return 'target="_blank"';
    }
    else
    {
        return '';
    }
}

function display_little_icon($img, $link)
{
    echo '<a href="' . return_url($link) . '" ' . return_target_blank_if_external($link) . '><div class="little-icon" style="background-image: url(' . return_url($img) . ');"></div></a>';
}

function display_big_icon($img, $link)
{
    echo '<a href="' . return_url($link) . '" ' . return_target_blank_if_external($link) . '><div class="circle" style="display: inline-block; margin: 0 15px; width: 10em; height: 10em; background-image: url(' . return_url($img) . '); background-size: cover;"></div></a>';
}

function log_current_page()
{
    global $config;
    try{
        $db = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8', $config['db_user'], $config['db_password']);
    }
    catch(Exception $e){
        die('error with database.');
    }

    $client_info = "";
    $date = NULL;

    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $client_info = htmlspecialchars($_SERVER['HTTP_X_FORWARDED_FOR']);
    }
    else if(isset($_SERVER['REMOTE_ADDR']))
    {
        $client_info = htmlspecialchars($_SERVER['REMOTE_ADDR']);
    }
    else
    {
        $client_info = NULL;
    }

    if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/')
    {
        $endpoint = htmlspecialchars($_SERVER['REQUEST_URI']);

        preg_match('/https?:\/\/([a-zA-Z0-9])+(\/(.)+)\//', $config['rooturl'], $matches);

        $matches[2] = str_replace('/', '\\/', $matches[2]);
        $endpoint = preg_replace('/' . $matches[2] . '/', '', $endpoint);
    }
    else
    {
        $endpoint = NULL;
    }

    date_default_timezone_set('Europe/Paris');
    $date = date("Y-m-d H:i:s");
    $req = $db->prepare('INSERT INTO stats(use_date, client_info, endpoint) VALUES(:use_date, :client_info, :endpoint)');
    $req->execute(array(
        'use_date' => $date,
        'client_info' => $client_info,
        'endpoint' => $endpoint
    ));
}

if($config['enable_stats'])
{
    log_current_page();
}
