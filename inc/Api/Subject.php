<?php

namespace Inc\Api;

class Subject
{
    public \Inc\Model\Subject $subject;
    public function __construct()
    {
        $this->subject = new \Inc\Model\Subject();
        add_action('rest_api_init', array($this, 'create_subject_api'));
    }
    public function create_subject_api()
    {
        register_rest_route('e-studying/v1', '/subject', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_all_subjects')
        ));
    }
    public function get_all_subjects($request)
    {
        $page = $request->get_param('page');
        $id = $request->get_param('id');
        $speciality_id = $request->get_param('speciality');
        $semester = $request->get_param('semester');
        $subjects = $this->subject->get_subjects($page, $id, $speciality_id, $semester);
        wp_send_json($subjects);
    }
}
