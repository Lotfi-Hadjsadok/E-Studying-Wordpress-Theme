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
    <span class="e-breadcrumbs">
        <strong> <a href="/">Accueil</a> > Speciality</strong> >
        <span class="e-breadcrumbs-specialities">
            <?php foreach ($specialities as $speciality) : ?>
                <?php $speciality_slug = '/speciality/' . $speciality->post_title; ?>
                <a href="<?= strtolower($speciality_slug)  ?>"><?= strtoupper($speciality->post_title) ?></a>
            <?php endforeach; ?>
        </span>
        >
        <a href="<?= strtolower($semester_slug) ?>"><?= strtoupper($semester)  ?></a> >
        <a href="<?= strtolower($subject_slug) ?>"><?= strtoupper(get_the_title())  ?></a> >
        <a href="<?= $course_type_slug ?>"><?= strtoupper($course_type) ?></a>
    </span>
    <div class="e-data-container">
        <?php foreach ($courses as $course) : ?>
            <a href="<?= $course->post_name ?>"><button><?= $course->post_title ?></button></a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();
