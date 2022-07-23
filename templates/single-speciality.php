<?php
get_header();

global $post;
$speciality_slug = '/speciality/' . $post->post_name;
$visited_specialities = get_user_meta(get_current_user_id(), '_speciality_visits', true) ?: null;
if ($visited_specialities) {
    $visited_specialities[get_the_ID()]->visited_count = (int) $visited_specialities[get_the_ID()]->visited_count + 1;
    update_user_meta(get_current_user_id(), '_speciality_visits', $visited_specialities);
}
var_dump($visited_specialities);
?>
<div class="container">
    <span class="e-breadcrumbs">
        <strong> <a href="/">Accueil</a> > Speciality</strong> >
        <a href="<?= $speciality_slug  ?>"><?= strtoupper($post->post_title)  ?></a>
    </span>

    <div class="e-data-container">
        <a href="s1"><button>S1</button></a>
        <a href="s2"> <button>S2</button> </a>
    </div>
</div>

<?php
get_footer();
