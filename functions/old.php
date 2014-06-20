$i = 0;
if ( have_posts() ) : 
  while ( have_posts() ) : the_post();
	if (get_hidepost() == 'hidden') {
		continue;
	} else {
		$aside = ('aside' == get_post_format()) ? ' aside ' : '';
		$link = ('link' == get_post_format()) ? ' aside ' : '';
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('entry' . $aside . $link . get_textcolor()); ?> <?php echo get_bgimg(); ?>>
			<div class="container">
				<div class="row">
					<?php 
					
					if ($i == 0 || !is_paged()) {
						include_once get_template_directory() . "/sidebar.php";
						get_archive_head();
					}
					if ('artwork' == get_post_type() &&  'image' == get_post_format()) {
						get_template_part('content', 'artwork' );
					} else {
						get_template_part('content', get_post_format() );
					}
					?>
				</div> <!-- .row -->
			</div> <!-- .container -->
		</article> <!-- #post -->
	<?php
	}
	$i++;
	endwhile;
else :
  get_template_part( 'content', 'none' );
endif;