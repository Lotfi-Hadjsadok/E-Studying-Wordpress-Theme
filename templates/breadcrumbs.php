<?php
global $wp_query;
$crumbs['speciality'] = $wp_query->query_vars['speciality'];
$crumbs['semester'] = $wp_query->query_vars['semester'];
$crumbs['subject'] = $wp_query->query_vars['subject'];
$crumbs['course_type'] = $wp_query->query_vars['course_type'];
$crumbs['course_name'] = $wp_query->query_vars['course_name'];

$slug = '/speciality';
?>

<span class="e-breadcrumbs">
    <p class="e-breadcrumbs-slug">
        <a href="/">Accueil</a>
    </p>
    <p class="e-breadcrumbs-slug">
        <strong>Speciality</strong>
    </p>
    <?php foreach ($crumbs as $crumb) : ?>
        <?php if ($crumb != '') : ?>
            <?php $slug .= '/' . $crumb ?>
            <p class="e-breadcrumbs-slug">
                <a href="<?= $slug ?>"><?= ucfirst($crumb) ?></a>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>
</span>