<?php

get_header();
echo get_query_var('name', 'lotfi');
the_title();
?>
<h1>Post type : <?= get_post_type(0) ?></h1>
<?php
get_footer();
