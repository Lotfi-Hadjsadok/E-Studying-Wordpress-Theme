<?php

namespace Inc\Route;

class Speciality
{
    public function __construct()
    {
        add_filter('query_vars', array($this, 'add_query_vars'), 10, 1);
        add_action('init', array($this, 'speciality_url_rewrite'));
    }
    public function add_query_vars($vars)
    {
        $vars[] = 'semester';
        $vars[] = 'subject';
        return $vars;
    }
    public function speciality_url_rewrite()
    {
        add_rewrite_rule('speciality/([^/]+)/([^/]+)/?([^/]*)', 'index.php?post_type=speciality&name=$matches[1]&semester=$matches[2]&subject=$matches[3]', 'top');
    }
}
