<?php

namespace Inc\Route;

class Module
{
    public function __construct()
    {
        add_action('request', array($this, 'module_url_overwrite'));
    }
    public function module_url_overwrite($query)
    {
        if (empty($query['post_type']) || empty($query['subject'])) {
            return $query;
        }
        $query = array(
            'page' => '',
            'post_type' => 'subject',
            'name' => $query['subject'],
        );
        return $query;
    }
}
