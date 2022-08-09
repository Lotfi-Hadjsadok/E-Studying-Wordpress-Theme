<?php
namespace Inc\Api;

class Faculty {
	public function __construct() {
		 add_action( 'rest_api_init', array( $this, 'create_faculty_api' ) );
	}
	public function create_faculty_api() {
		register_rest_route(
			'e-studying/v1',
			'/faculty',
			array(
				'methods'  => 'GET',
				'callback' => array( $this, 'get_all_faculties' ),
			)
		);
	}
	public function get_all_faculties() {
		$terms = get_terms(
			array(
				'taxonomy'   => 'faculty',
				'hide_empty' => false,
			)
		);
		wp_send_json( $terms );
	}
}