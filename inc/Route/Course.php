<?php

namespace Inc\Route;

class Course
{
    public function __construct()
    {
        add_action('request', array($this, 'module_url_overwrite'));
    }
    public function module_url_overwrite($query)
    {
        if (empty($query['post_type']) || empty($query['course_name'])) {
            return $query;
        }

        $query = array(
            'page' => '',
            'post_type' => 'course',
            'name' => $query['course_name'],
            'course_type' => $query['course_type'],
            'subject' => $query['subject'],
            'course_name' => $query['course_name'],
            'speciality' => $query['speciality'],
            'semester' => $query['semester']
        );

        return $query;
    }
}
