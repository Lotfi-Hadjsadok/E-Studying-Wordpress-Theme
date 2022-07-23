<?php

namespace Inc\Model;

class Speciality
{
   public string $title;
   public string $school_year;

   public function add_data_to_speciality($speciality)
   {
      $speciality->school_year = get_field('school_year', $speciality->ID);

      return $speciality;
   }
   public function get_specialities(int $page = null, int $id = null, bool $visits_algo = false)
   {
      $args = array(
         'post_type' => 'speciality',
         'posts_per_page' => -1,
         'offset' => $page * API_POSTS_PER_PAGE,
      );
      if ($page != null) {
         $args['posts_per_page'] = API_POSTS_PER_PAGE;
      }
      if ($id != null) {
         $args['post__in'] = array($id);
      }
      if ($visits_algo) {
         $args['order_by'] = 'meta_value_num';
      }
      $specialities = get_posts($args);
      foreach ($specialities as  $speciality) {
         $speciality = $this->add_data_to_speciality($speciality);
      }
      return $specialities;
   }
}
