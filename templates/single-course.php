<?php


get_header();
global $post;

$course_file = get_field('course_file');
?>
<div class="container">
    <?php do_action('e-breadcrumbs') ?>
    <div class="e-data-container">
        <a href="<?= $course_file ?>"><button>Fichier du Cours</button></a>
    </div>
</div>
<?php
get_footer();
