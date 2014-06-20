<article id="post-<?php the_ID(); ?>" <?php post_class('entry col-sm-8'); ?>>
  
	<header class="entry-header">
		<?php psfc_the_kicker(); ?>

  	<?php if ( is_single() ) : ?>
  	<h1 class="entry-title"><?php the_title(); ?></h1>
  	<?php else : ?>
  	<h3 class="entry-title">
  		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
  	</h3>
  	<?php endif; // is_single() ?>
  </header><!-- .entry-header -->
  
	<div class="entry-summary hidden">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
    <?php psfc_entry_meta($post->ID); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
