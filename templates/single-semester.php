<?php

use Inc\Model\Subject;

get_header();
global $post;
$subjects = new Subject();
$subjects = $subjects->get_subjects(null, null, get_the_ID(), $semester);

?>
<div class="container">
    <?php do_action('e-breadcrumbs') ?>
    <div class="e-data-container">
        <?php foreach ($subjects as $subject) : ?>
            <a href="<?= $subject->post_name ?>"><button><?= $subject->post_title ?></button></a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();
