<?php

namespace Inc\Route;

class Semester
{
    public function __construct()
    {
        add_filter('template_include', array($this, 'semester_template'));
    }
    function semester_template($template)
    {

        $query_vars['semester'] = get_query_var('semester', null);
        $query_vars['subject'] = get_query_var('subject', null);
        $query_vars['name'] = get_query_var('name', null);
        if ($query_vars['semester'] != '' && $query_vars['subject'] == '') {
            $template = PLUGIN_DIR . '/templates/single-semester.php';
        }
        return $template;
    }
}
