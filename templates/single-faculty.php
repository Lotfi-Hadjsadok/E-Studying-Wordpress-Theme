<?php

use Inc\Model\Speciality;

get_header();
$taxonomy      = get_queried_object();
$taxonomy_slug = '/faculty/' . $taxonomy->slug;
$specialities  = new Speciality();
$specialities  = $specialities->get_specialities( null, null, $taxonomy->slug );
?>
<div class="container">
    <img width="100" height="100" src="<?php echo ttw_thumbnail_url( 0 ); ?>" alt="">
    <span class="e-breadcrumbs">
        <p class="e-breadcrumbs-slug">
            <a href="/">Accueil</a>
        </p>
        <p class="e-breadcrumbs-slug">
            <strong>Faculté</strong>
        </p>
        <p class="e-breadcrumbs-slug">
            <a href="<?php echo $taxonomy_slug; ?>"><?php echo strtoupper( $taxonomy->name ); ?></a>
        </p>
    </span>
    <div class="e-data-container">
        <?php foreach ( $specialities as $speciality ) : ?>
        <a href="/speciality/<?php echo $speciality->post_name; ?>">
            <div class="card">
                <span class="card__info"><?php the_field( 'school_year', $speciality->ID ); ?></span>
                <?php echo $speciality->post_title; ?>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();