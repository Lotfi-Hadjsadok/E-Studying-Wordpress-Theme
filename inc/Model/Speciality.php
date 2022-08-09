<?php

namespace Inc\Model;

class Speciality {

	public string $title;
	public string $school_year;

	public function add_data_to_speciality( $speciality ) {
		$speciality->school_year = get_field( 'school_year', $speciality->ID );
		$speciality->faculty     = wp_get_post_terms( $speciality->ID, 'faculty', array( 'fields' => 'all' ) )[0];

		return $speciality;
	}
	public function get_specialities( int $page = null, int $id = null, string $faculty = null ) {
		$args = array(
			'post_type'      => 'speciality',
			'posts_per_page' => -1,
			'offset'         => $page * API_POSTS_PER_PAGE,
		);
		if ( $page !== null ) {
			$args['posts_per_page'] = API_POSTS_PER_PAGE;
		}
		if ( $id != null ) {
			$args['post__in'] = array( $id );
		}
		if ( $faculty != null ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'faculty',
					'field'    => 'slug',
					'terms'    => $faculty,
				),
			);
		}
		$specialities = get_posts( $args );
		foreach ( $specialities as  $speciality ) {
			$speciality = $this->add_data_to_speciality( $speciality );
		}
		return $specialities;
	}


	public function filter_using_faculty( $specialities, $faculty ) {
		return array_filter(
			$specialities,
			function ( $value, $key ) use ( $faculty ) {
				if ( $value->faculty->slug === $faculty ) {
						return true;
				} else {
					false;
				}
			},
			ARRAY_FILTER_USE_BOTH
		);
	}

	public function update_specialities_algorithm_views() {
		if ( get_current_user_id() ) {
			$visited_specialities = get_user_meta( get_current_user_id(), '_speciality_visits', true ) ?: null;
			if ( $visited_specialities ) {
				$visited_specialities[ get_the_ID() ]->visited_count = (int) $visited_specialities[ get_the_ID() ]->visited_count + 1;
				update_user_meta( get_current_user_id(), '_speciality_visits', $visited_specialities );
			}
		}
	}
	public function get_specialities_algorithm( string $faculty = null ) {
		if ( get_current_user_id() ) {
			$visited_specialities = get_user_meta( get_current_user_id(), '_speciality_visits', true ) ?: null;
			if ( $visited_specialities == null ) {
				$specialities = $this->get_specialities();
				foreach ( $specialities as $speciality ) {
					// TO PUT THE POST ID AS ARRAY_KEY
					$specialities_to_push[ $speciality->ID ]               = $speciality;
					$specialities_to_push[ $speciality->ID ]->visits_count = 0;
				}
				update_user_meta( get_current_user_id(), '_speciality_visits', $specialities_to_push );
			} else {
				uasort(
					$visited_specialities,
					function ( $a, $b ) {
						return $a->visited_count < $b->visited_count;
					}
				);

				// GET ONLY OUR TAXONOMY
				$specialities = $visited_specialities;
			}
		} else {
			$specialities = $this->get_specialities();
		}
		if ( $faculty != null ) {
			$specialities = $this->filter_using_faculty( $specialities, $faculty );
		}
		return $specialities;
	}
}