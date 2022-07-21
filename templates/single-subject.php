<?php
get_header();
global $post;

$semester = get_field('subject_semestre');
$specialities = get_field('subject_speciality');
$semester_slug = $speciality_slug . '/' . $semester;

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

        <a href="<?= strtolower($subject_slug) ?>"><?= strtoupper(get_the_title())  ?></a>

    </span>
</div>
<?php
get_footer();
