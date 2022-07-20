<?php

namespace Inc\Model;

class Subject
{
   public string $title;
   public Subject $subject;


   public function add_data_to_subject($subject)
   {
      $subject->subject_speciality = get_field('subject_speciality', $subject->ID);
      return $subject;
   }
   public function get_subjects(int $page = null, int $id = null, string $speciality_id = null, string $semester = null)
   {
      $args = array(
         'post_type' => 'subject',
         'posts_per_page' => API_POSTS_PER_PAGE,
         'offset' => $page * API_POSTS_PER_PAGE,
      );
      if ($id != null) {
         $args['post__in'] = array($id);
      }
      if ($speciality_id != null) {
         $speciality_id = explode(',', $speciality_id);
         $args['meta_query'] = array('relation' => 'AND');
         foreach ($speciality_id as $id) {
            $args['meta_query'][] = array(
               'key' => 'subject_speciality',
               'value' => '"' . $id . '"',
               'compare' => 'LIKE'
            );
         }
      }
      if ($semester != null) {
         $args['meta_query'][] = array(
            'key' => 'subject_semestre',
            'value' => $semester,
            'compare' => '='
         );
      }
      $subjects = get_posts($args);
      foreach ($subjects as $subject) {
         $subject = $this->add_data_to_subject($subject);
      }
      return $subjects;
   }
}
