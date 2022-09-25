<?php

use Inc\Model\Speciality;

get_header();

global $post;
// $speciality = new Speciality();
// $speciality->update_specialities_algorithm_views();
$semesters = array( 's1', 's2' );
?>
<div class="container">
	<?php do_action( 'e-breadcrumbs' ); ?>

	<div class="e-data-container">
		<?php foreach ( $semesters as $semester ) : ?>
		<a href="<?php echo $semester; ?>">
			<div class="card">
				<div class="card__info">Semestre</div>
				 <?php echo strtoupper( $semester ); ?>
			</div>
		</a>

		<?php endforeach; ?>
	</div>
</div>

<?php
get_footer();
