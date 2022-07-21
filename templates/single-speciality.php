<?php
get_header();

global $post;
$speciality_slug = '/speciality/' . $post->post_name;
?>
<div class="container">
    <span class="e-breadcrumbs">
        <strong> <a href="/">Accueil</a> > Speciality</strong> >
        <a href="<?= $speciality_slug  ?>"><?= strtoupper($post->post_title)  ?></a>
    </span>
</div>
<?php

get_footer();
