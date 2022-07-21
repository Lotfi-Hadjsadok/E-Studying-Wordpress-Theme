<?php

namespace Inc\Theme;

class Enqueue
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    public function enqueue_scripts()
    {
        wp_enqueue_style('breadcrumps-css', PLUGIN_DIR_URL . '/src/css/breadcrumps.css');
    }
}
