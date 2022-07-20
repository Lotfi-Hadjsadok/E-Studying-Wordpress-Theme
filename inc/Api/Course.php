<?php 
namespace Inc\Api;
class Course{
    public \Inc\Model\Course $course;
    public function __construct()
    {
        $this->course = new \Inc\Model\Course();
        add_action('rest_api_init',array($this,'create_course_api'));
    }
    public function create_course_api(){
        register_rest_route( 'e-studying/v1','/course', array(
            'methods'=>'GET',
            'callback'=>array($this,'get_all_courses')
        ) );
    }
    public function get_all_courses($request){
        $page = $request->get_param('page');
        $id = $request->get_param('id');
        $module_id = $request->get_param('module');
        $courses = $this->course->get_courses($page,$id,$module_id);
        wp_send_json($courses);
    }
}