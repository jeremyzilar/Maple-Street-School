<?php

function loop($type){
	$i = 0;
	// global $wp_query;
	// echo $wp_query->found_posts;
	// echo $wp_query->request;
	// exit;

	if (have_posts()) {
		while (have_posts()) {
			the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
				<div class="container">
					<div class="row">
						<?php
							if (empty($type)) {
								get_template_part('content', get_post_format() );
							} else {
								get_template_part('content', $type );
							}
						?>
					</div> <!-- .row -->
				</div> <!-- .container -->
			</article> <!-- #post -->
		<?php
		$i++;
		}
		// include TDIR . '/nextprev.php';
	} else {
		// get_template_part( 'content', 'none' );
	}
}

?>
