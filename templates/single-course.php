<?php


get_header();
global $post;

$course_file = get_field( 'course_file' );
?>
<div class="container">
    <?php do_action( 'e-breadcrumbs' ); ?>
    <div class="e-data-container">
        <a href="<?php echo $course_file; ?>">
            <div class="card">
                <div class="card__info"><i class="lni lni-download"></i></div>
                Fichier du Cours
            </div>
        </a>
    </div>
</div>
<?php
get_footer();