<?php

namespace Inc\Model;

class Course {

	public string $title;
	public int $module_id;
	public string $course_file;
	public string $course_type;


	public function add_data_to_course( $course ) {
		$course->course_module = get_field( 'course_module', $course->ID );
		$course->course_file   = get_field( 'course_file', $course->ID );
		$course->course_type   = get_field( 'course_type', $course->ID );
		return $course;
	}
	public function get_courses( int $page = null, int $id = null, int $module_id = null, string $course_type = null ) {
		$args = array(
			'post_type' => 'course',
			'posts_per_page' => -1,
			'offset'         => $page * API_POSTS_PER_PAGE,

		);
		if ( $page != null ) {
			$args['posts_per_page'] = API_POSTS_PER_PAGE;
		}
		if ( $id != null ) {
			$args['post__in'] = array( $id );
		}
		$args['meta_query']['relation'] = 'AND';
		if ( $module_id != null ) {
			$args['meta_query'][] =
			array(
				'key'     => 'course_module',
				'value'   => $module_id,
				'compare' => '=',
			);
		}
		if ( $course_type != null ) {
			$args['meta_query'][] =
			array(
				'key'     => 'course_type',
				'value'   => $course_type,
				'compare' => '=',
			);
		}
		$courses = get_posts( $args );
		foreach ( $courses as $course ) {
			$course = $this->add_data_to_course( $course );
		}
		return $courses;
	}
}