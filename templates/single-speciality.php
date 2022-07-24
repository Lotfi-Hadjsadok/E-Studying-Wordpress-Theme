<?php

use Inc\Model\Speciality;

get_header();

global $post;
$speciality = new Speciality();
$speciality->update_specialities_algorithm_views();
?>
<div class="container">
    <?php do_action('e-breadcrumbs') ?>
    <div class="e-data-container">
        <a href="s1"><button>S1</button></a>
        <a href="s2"> <button>S2</button> </a>
    </div>
</div>

<?php
get_footer();
