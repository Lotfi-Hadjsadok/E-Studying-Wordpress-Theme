<?php
get_header();
global $post;

$semester = get_field('subject_semestre');
$speciality = get_field('subject_speciality');
$speciality = $speciality[0];
$speciality_slug = '/speciality/' . $speciality->post_title;
$semester_slug = $speciality_slug . '/' . $semester;
$subject_slug = $semester_slug . '/' . $post->post_name;

?>
<div class="container">
    <span class="e-breadcrumbs">
        <strong>Speciality</strong> >
        <a href="<?= strtolower($speciality_slug)  ?>"><?= strtoupper($speciality->post_title) ?></a> >
        <a href="<?= strtolower($semester_slug) ?>"><?= strtoupper($semester)  ?></a> >
        <a href="<?= strtolower($subject_slug) ?>"><?= strtoupper(get_the_title())  ?></a>
    </span>
</div>
<?php
get_footer();
