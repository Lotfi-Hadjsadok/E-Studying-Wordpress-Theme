<?php

namespace Inc;

class Functions
{
    public function __construct()
    {
        add_filter('template_include', array($this, 'templates_include'));
    }


    public function templates_include($template)
    {
        global $post;
        if ($post->post_type ==  'course') {
            $template = PLUGIN_DIR . 'templates/single-course.php';
        } else if ($post->post_type ==  'subject') {
            $template = PLUGIN_DIR . 'templates/single-subject.php';
        } else if (is_tax('faculty')) {
            $template = PLUGIN_DIR . 'templates/single-faculty.php';
        } else if ($post->post_type ==  'speciality') {
            $template = PLUGIN_DIR . 'templates/single-speciality.php';
        }
        return $template;
    }
}
