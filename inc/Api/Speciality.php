<?php

namespace Inc\Api;

class Speciality
{
    public \Inc\Model\Speciality $speciality;
    public function __construct()
    {
        $this->speciality = new \Inc\Model\Speciality();
        add_action('rest_api_init', array($this, 'create_speciality_api'));
    }
    public function create_speciality_api()
    {
        register_rest_route('e-studying/v1', '/speciality', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_all_specialities')
        ));
    }
    public function get_all_specialities($request)
    {
        $page = $request->get_param('page');
        $id = $request->get_param('id');
        $specialities = $this->speciality->get_specialities($page, $id);
        wp_send_json($specialities);
    }
}
