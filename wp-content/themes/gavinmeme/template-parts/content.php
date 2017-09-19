<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GavinMeMe
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php gavinmeme_diplayThumbnail('thumbnail');?>
    </div>
	<div class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gavinmeme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
        <div class="entry-content">
			<?php
			if(!is_single()&&!is_page()){
				the_excerpt();
			}else{
				the_content();
			}
			?>
        </div><!-- .entry-content -->
	</div><!-- .entry-header -->
	<?php ( is_single() ? entryTag() : ''); ?>
</article><!-- #post-<?php the_ID(); ?> -->
