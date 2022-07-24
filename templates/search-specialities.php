<?php

use Inc\Model\Speciality;

$specialities = new Speciality();
$specialities = $specialities->get_specialities_algorithm();
?>
<div class="e-search">
    <select class="e-search-specialities" name="" id="">
        <option value="" selected disabled>Selectionner votre spécialitié</option>
        <?php foreach ($specialities as $speciality) : ?>
            <option value="<?= $speciality->post_name ?>"><?= $speciality->post_title ?></option>
        <?php endforeach; ?>
    </select>
</div>