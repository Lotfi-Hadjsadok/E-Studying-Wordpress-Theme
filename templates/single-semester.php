<?php

use Inc\Model\Subject;

get_header();
$subjects = new Subject();
$subjects = $subjects->get_subjects(null, null, get_the_ID(), $semester);
var_dump($subjects);
?>
    
<?php
get_footer();
