
<article id="post-<?php the_ID(); ?>" <?php post_class2(); ?> >
	<div class="post-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="content-post-title">', '</h1>' );
		else :
			the_title( '<h2 class="content-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
			<div class="content-post-meta">
				<?php gavinmeme_posted_on(); ?>
				<?php echo '|'.'<span class="list-category">' .get_the_category_list(esc_html__(', ','gavinmeme')) . '</span>' ?>
				<?php
				if(comments_open()){
					echo '| <span class="meta-reply">';
					comments_popup_link(
						__( 'No Comments', 'gavinmeme' ),
						__( 'One a comment', 'gavinmeme' ),
						__( '% comments', 'gavinmeme' ),
						__( 'Read all comments', 'gavinmeme' )
					);
					echo '</span>';
				}
				?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
		<div class="post-content-main">
			<?php
			if(!is_single()&&!is_page()){
				the_excerpt();
			}else{
				the_content();
			}
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-header -->
	<!-- #sidebar-for-post -->
	<?php ( is_single() ? entryTag() : ''); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<aside id="sidebar-for-post" class="sidebar-post">
	<?php dynamic_sidebar( 'sidebar-post' ); ?>
</aside>	<!-- #sidebar-for-post -->
