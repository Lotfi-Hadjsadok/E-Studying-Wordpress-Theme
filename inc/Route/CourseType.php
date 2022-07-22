<?php

namespace Inc\Route;

class CourseType
{
    public function __construct()
    {
        add_filter('template_include', array($this, 'course_type_template'));
    }
    function course_type_template($template)
    {

        $query_vars['course_type'] = get_query_var('course_type', null);
        $query_vars['course_name'] = get_query_var('course_name', null);
        if ($query_vars['course_type'] != '' && $query_vars['course_name'] == '') {
            $template = PLUGIN_DIR . '/templates/single-course-type.php';
        }
        return $template;
    }
}
