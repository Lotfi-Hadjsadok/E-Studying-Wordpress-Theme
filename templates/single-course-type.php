<?php

use Inc\Model\Course;

get_header();
global $post;

$semester = get_field('subject_semestre');
$specialities = get_field('subject_speciality');
$this_speciality = get_query_var('speciality');
$this_speciality_slug = '/speciality/' . $this_speciality;
$semester_slug = $this_speciality_slug . '/' . $semester;
$subject_slug = $semester_slug . '/' . $post->post_name;
$course_type = get_query_var('course_type');
$course_type_slug = $subject_slug . '/' . $course_type;



$courses = new Course();
$courses = $courses->get_courses(null, null, get_the_ID(), $course_type);
?>
<div class="container">
    <?php do_action('e-breadcrumbs') ?>
    <div class="e-data-container">
        <?php foreach ($courses as $course) : ?>
            <a href="<?= $course->post_name ?>"><button><?= $course->post_title ?></button></a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();
