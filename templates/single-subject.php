<?php
get_header();
$course_types = array(
	array(
		'label' => 'cours',
		'icon'  => 'lni lni-book',
	),
	array(
		'label' => 'td',
		'icon'  => 'lni lni-pencil-alt',
	),
	array(
		'label' => 'tp',
		'icon'  => 'lni lni-write',
	),
	array(
		'label' => 'examen',
		'icon'  => 'lni lni-graduation',
	),
)
?>
<div class="container">
    <?php do_action( 'e-breadcrumbs' ); ?>
    <div class="e-data-container">
        <?php foreach ( $course_types as $course_type ) : ?>
        <a href="<?php echo $course_type['label']; ?>">
            <div class="card">
                <div class="card__info">
                    <i class="<?php echo $course_type['icon']; ?>"></i>
                </div>
                <?php echo strtoupper( $course_type['label'] ); ?>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php
get_footer();