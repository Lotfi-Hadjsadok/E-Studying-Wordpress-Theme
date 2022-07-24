<?php

use Inc\Model\Speciality;

get_header();
$taxonomy = get_queried_object();
$taxonomy_slug = '/faculty/' . $taxonomy->slug;
$specialities = new Speciality();
$specialities = $specialities->get_specialities_algorithm($taxonomy->slug);
?>
<div class="container">
    <span class="e-breadcrumbs">
        <strong> <a href="/">Accueil</a> > Faculté</strong> >
        <a href="<?= $taxonomy_slug  ?>"><?= strtoupper($taxonomy->name)  ?></a>
    </span>
    <div class="e-data-container">
        <?php foreach ($specialities as $speciality) : ?>
            <a href="/speciality/<?= $speciality->post_name ?>"><button><?= $speciality->post_title ?></button></a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();
