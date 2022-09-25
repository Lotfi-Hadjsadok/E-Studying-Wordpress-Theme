<?php

use Inc\Model\Subject;

get_header();
global $post;
$subjects = new Subject();
$subjects = $subjects->get_subjects( null, null, get_the_ID(), $semester );

?>
<div class="container">
    <?php do_action( 'e-breadcrumbs' ); ?>
    <div class="e-data-container">
        <?php foreach ( $subjects as $subject ) : ?>
        <a href="<?php echo $subject->post_name; ?>">
            <div class="card">
                <div class="card__info"><?php the_field( 'subject_semestre', $subject->ID ); ?></div>
                <?php echo $subject->post_title; ?>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();