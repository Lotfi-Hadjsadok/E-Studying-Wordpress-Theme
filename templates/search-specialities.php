<?php

use Inc\Model\Speciality;

$specialities = new Speciality();
$specialities = $specialities->get_specialities();
if (get_current_user_id()) {
    $visited_specialities = get_user_meta(get_current_user_id(), '_speciality_visits', true) ?: null;
    if ($visited_specialities == null) {
        foreach ($specialities as $speciality) {
            // TO PUT THE POST ID AS ARRAY_KEY
            $specialities_to_push[$speciality->ID] = $speciality;
            $specialities_to_push[$speciality->ID]->visits_count = 0;
        }
        update_user_meta(get_current_user_id(), '_speciality_visits', $specialities_to_push);
    }

    uasort($visited_specialities, function ($a, $b) {
        return $a->visited_count < $b->visited_count;
    });

    $specialities = $visited_specialities;
}

?>
<div class="e-search">
    <select class="e-search-specialities" name="" id="">
        <option value="" selected disabled>Selectionner votre spécialitié</option>
        <?php foreach ($specialities as $speciality) : ?>
            <option value="<?= $speciality->post_name ?>"><?= $speciality->post_title ?></option>
        <?php endforeach; ?>
    </select>
</div>