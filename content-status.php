<article id="post-<?php the_ID(); ?>" <?php post_class('entry col-sm-8'); ?>>
  
  <header class="entry-header">
  	<h6 class="entry-title">
			<?php psfc_category(); ?>
		</h6>
  </header><!-- .entry-header -->
  
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
    <?php psfc_entry_meta($post->ID); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
