<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package base
 */

$cardClasses = array(
    'ui',
	'fluid',
	'padded',
    'card',
);
if (has_tag('dhivehi')) {//if post is dhivehi, add .rtl
	array_push($cardClasses, "rtl");
}
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class($cardClasses);?> >
	<div class="content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				if (has_tag('dhivehi')) {//thaana titles
					the_title( '<h1 class="entry-title header rtl thaana">', '</h1>');
				} else {
					the_title( '<h1 class="entry-title header">', '</h1>' );	
				}
			else :
				if (has_tag('dhivehi')) {//thaana titles
					the_title( '<h2 class="entry-title header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="rtl thaana">', '</a></h2>' );
				} else {
					the_title( '<h2 class="entry-title header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta meta">
					<?php
					base_posted_on();
					base_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->		
	</div>


	<?php base_post_thumbnail();?>
	<div class="entry-content description <?php 
				if (has_tag('dhivehi')) {
					printf('thaana');
				}
				?>">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'base' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'base' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer extra content">
		<?php base_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
