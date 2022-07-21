<?php
get_header();
global $post;

$semester = get_query_var('semester');
$speciality_slug = '/speciality/' . $post->post_name;
$semester_slug = $speciality_slug . '/' . $semester;


?>
<div class="container">
    <span class="e-breadcrumbs">
        <strong>Speciality</strong> >
        <a href="<?= strtolower($speciality_slug) ?>"><?= strtoupper($post->post_title) ?></a> >
        <a href="<?= strtolower($semester_slug) ?>"><?= strtoupper($semester)  ?></a>
    </span>
</div>
<?php
get_footer();
