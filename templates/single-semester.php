<?php

use Inc\Model\Subject;

get_header();
global $post;
$subjects = new Subject();
$semester = get_query_var('semester');
$subjects = $subjects->get_subjects(null, null, get_the_ID(), $semester);
$speciality_slug = '/speciality/' . $post->post_name;
$semester_slug = $speciality_slug . '/' . $semester;


?>
<div class="container">
    <span class="e-breadcrumbs">
        <strong> <a href="/">Accueil</a> > Speciality</strong> >
        <a href="<?= strtolower($speciality_slug) ?>"><?= strtoupper($post->post_title) ?></a> >
        <a href="<?= strtolower($semester_slug) ?>"><?= strtoupper($semester)  ?></a>
    </span>

    <div class="e-data-container">
        <?php foreach ($subjects as $subject) : ?>
            <a href="<?= $subject->post_name ?>"><button><?= $subject->post_title ?></button></a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();
