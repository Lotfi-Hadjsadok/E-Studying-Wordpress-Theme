<?php


get_header();
global $post;

$course_file = get_field('course_file');

$semester = get_query_var('semester');
$this_speciality = get_query_var('speciality');

$subject = get_field('course_module');
$this_speciality_slug = '/speciality/' . $this_speciality;
$semester_slug = $this_speciality_slug . '/' . $semester;
$subject_slug = $semester_slug . '/' . $subject->post_name;
$course_type = get_query_var('course_type');
$course_type_slug = $subject_slug . '/' . $course_type;
$course_name_slug = $course_type_slug . '/' . $post->post_name;
$specialities = get_field('subject_speciality', $subject->ID);

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
        <a href="<?= strtolower($subject_slug) ?>"><?= strtoupper($subject->post_title)  ?></a> >
        <a href="<?= $course_type_slug ?>"><?= strtoupper($course_type) ?></a> >
        <a href="<?= $course_name_slug ?>"><?= strtoupper($post->post_title) ?></a>
    </span>
    <div class="e-data-container">
        <a href="<?= $course_file ?>"><button>Fichier du Cours</button></a>
    </div>
</div>
<?php
get_footer();
