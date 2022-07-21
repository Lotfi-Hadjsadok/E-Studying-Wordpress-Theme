<?php

namespace Inc\Theme;

class Enqueue
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    public static function get_css_files()
    {
        $css_files = array(
            'breadcrumps',
            'search-specialities'
        );
        return $css_files;
    }
    public static function get_js_files()
    {
        $js_files = array(
            'search-specialities'
        );
        return $js_files;
    }
    public function enqueue_scripts()
    {
        foreach (self::get_css_files() as $css) {
            wp_enqueue_style($css . '-css', PLUGIN_DIR_URL . '/src/css/' . $css . '.css');
        }
        foreach (self::get_js_files() as $js) {
            wp_enqueue_script($js . '-js', PLUGIN_DIR_URL . '/src/js/' . $js . '.js', array('jquery'), '1.0', true);
        }
    }
}