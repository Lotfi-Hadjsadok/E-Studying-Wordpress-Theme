<?php

use Inc\Model\Course;

get_header();
global $post;

$semester             = get_field( 'subject_semestre' );
$specialities         = get_field( 'subject_speciality' );
$this_speciality      = get_query_var( 'speciality' );
$this_speciality_slug = '/speciality/' . $this_speciality;
$semester_slug        = $this_speciality_slug . '/' . $semester;
$subject_slug         = $semester_slug . '/' . $post->post_name;
$course_type          = get_query_var( 'course_type' );
$course_type_slug     = $subject_slug . '/' . $course_type;


switch ( $course_type ) {
	case 'cours':
		$icons = 'lni lni-book';
		break;
	case 'td':
		$icons = 'lni lni-pencil-alt';
		break;
	case 'tp':
		$icons = 'lni lni-write';
		break;
	case 'examen':
		$icons = 'lni lni-graduation';
		break;
}
$courses = new Course();
$courses = $courses->get_courses( null, null, get_the_ID(), $course_type );
?>
<div class="container">
    <?php do_action( 'e-breadcrumbs' ); ?>
    <div class="e-data-container">
        <?php foreach ( $courses as $course ) : ?>
        <a href="<?php echo $course->post_name; ?>">
            <div class="card">
                <div class="card__info">
                    <i class="<?php echo $icons; ?>"></i>
                </div>
                <?php echo $course->post_title; ?>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();