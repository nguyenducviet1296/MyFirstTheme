<?php
/**
 * GavinMeMe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GavinMeMe
 */

if ( ! function_exists( 'gavinmeme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gavinmeme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GavinMeMe, use a find and replace
		 * to change 'gavinmeme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gavinmeme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'      => esc_html__( 'Primary', 'gavinmeme' ),
			'menu-footer' => esc_html__( 'Menu Footerr', 'gavinmeme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gavinmeme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gavinmeme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gavinmeme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gavinmeme_content_width', 640 );
}

add_action( 'after_setup_theme', 'gavinmeme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gavinmeme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gavinmeme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gavinmeme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'gavinmeme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gavinmeme_scripts() {

	wp_enqueue_style( 'gavinmeme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gavinmeme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gavinmeme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_register_style( 'gavinmeme-index-style', get_template_directory_uri() . '/layouts/content-sidebar.css' );

	wp_enqueue_style( 'gavinmeme-index-style' );

	wp_register_style( 'gavinmeme-index-content-style', get_template_directory_uri() . '/assets/css/index-style.css' );

	wp_enqueue_style( 'gavinmeme-index-content-style' );

	wp_enqueue_script( 'gavinmeme-js', get_template_directory_uri() . '/assets/js/jquery-min.js', array(), '2017', true );
	wp_enqueue_script( 'gavinmeme-menu-js', get_template_directory_uri() . '/assets/js/my-menu-js.js', array(), '2017', true );

	wp_register_style( 'gavinmeme-footer-style', get_template_directory_uri() . '/assets/css/footer-style.css' );
	wp_enqueue_style( 'gavinmeme-footer-style' );

	wp_register_style( 'gavinmeme-widget-style', get_template_directory_uri() . '/assets/css/widget-style.css' );
	wp_enqueue_style( 'gavinmeme-widget-style' );

	wp_register_style( 'gavinmeme-menutab-style', get_template_directory_uri() . '/assets/css/menu-tab-widget.css' );
	wp_enqueue_style( 'gavinmeme-menutab-style' );

	wp_register_style( 'gavinmeme-search-form-style', get_template_directory_uri() . '/assets/css/search-form-style.css' );
	wp_enqueue_style( 'gavinmeme-search-form-style' );

	wp_register_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome-4.7.0/css/font-awesome.css' );
	wp_enqueue_style( 'font-awesome' );

	wp_register_style( 'post-style-css', get_template_directory_uri() . '/assets/css/post-style.css' );
	wp_enqueue_style( 'post-style-css' );

	wp_enqueue_script( 'gavinmeme-search-form-js', get_template_directory_uri() . '/assets/js/search-form.js', array(), '2017', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'gavinmeme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function readMore() {
	return '</br><a href="' . get_permalink() . '" class="read-more">' . __( 'Read More', 'gavinmeme' ) . '</a>';
}

add_filter( 'excerpt_more', 'readMore' );
if ( ! function_exists( 'gavinmeme_diplayThumbnail' ) ) {
	function gavinmeme_diplayThumbnail( $size ) {
		if ( ! is_single() && has_post_thumbnail() && ! post_password_required() || has_post_format( 'image' ) ) {
			?>
            <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
			<?php
		}
	}
}
if ( ! function_exists( 'gavinmeme_diplayThumbnailMenuTab' ) ) {
	function gavinmeme_diplayThumbnailMenuTab( $size ) {
		if ( has_post_thumbnail() && ! post_password_required() || has_post_format( 'image' ) ) {
			?>
            <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
			<?php
		}
	}
}
if ( ! function_exists( 'entryTag' ) ) {
	function entryTag() {
		if ( has_tag() ) {
			echo '<div class="entry-tag">';
			printf( __( 'Tagged in %1$s ', 'gavinmeme' ), get_the_tag_list( '', ',' ) );
			echo '</div>';
		}
	}
}

/**Creat Simple Widget*/
//Register
add_action( 'widgets_init', 'create_SimpleWidget' );
function create_SimpleWidget() {
	register_widget( 'GavinMEME_Widget' );
}

class GavinMEME_Widget extends WP_Widget {
	//Info, description widget
	function __construct() {
		parent::__construct(
			'gavin_widgetsimple',
			'New Widget',
			array(
				'description' => 'Nothing in here'
			)
		);
	}

	//Create Input
	function form( $instance ) {
		$default  = array(
			'title'   => 'Gavin Widget',
			'content' => 'Say something'
		);
		$instance = wp_parse_args( $instance, $default );
		$title    = esc_attr( $instance['title'] );
		$content  = esc_attr( $instance['content'] );
		?>
        Title:
        <input class="widefat" type="text" name="<?php echo $this->get_field_name( 'title' ) ?>"
               value="<?php echo $title ?>"/>
        Content:
        <textarea class="widefat"
                  name="<?php echo $this->get_field_name( 'content' ) ?>"><?php echo $content ?></textarea>
		<?php
	}

	//Save date form
	function update( $new_instance, $old_instance ) {
		$instance            = $old_instance;
		$instance['title']   = $new_instance['title'];
		$instance['content'] = $new_instance['content'];

		return $instance;
	}

	//Show widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo( '<a href="#">' . $title . '</a>' );
		echo( '<div href="#">' . $instance['content'] . '</div>' );
		echo $args['after_widget'];
	}
}

// Create MenuTab
add_filter( 'widgets_init', 'MenuTabWidgetByKD' );
function MenuTabWidgetByKD() {
	register_widget( 'MenuTabWidget' );
}

class MenuTabWidget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'gavin-meme-menu-tab-widget',
			__( 'Menu Tab Kinh Khủng', 'gavinmeme' ),
			array(
				'description' => __( 'Menu Tab khủng =))', 'gavinmeme' )
			)
		);
	}

	function form( $instance ) {
		$default = array(
			'title1' => 'Recent Post',
			'title2' => 'First Post'
		);

		$instance = wp_parse_args( $instance, $default );
		?>
        <input type="text" value="<?php echo $instance['title1']; ?>"
               name="<?php echo $this->get_field_name( 'title1' ); ?>"/>
        <br>
        <input type="text" value="<?php echo $instance['title2']; ?>"
               name="<?php echo $this->get_field_name( 'title2' ); ?>"/>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title1'] = $new_instance['title1'];
		$instance['title2'] = $new_instance['title2'];

		return $instance;
	}

	function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
        <div class="menutab-widget-gavinmeme">
            <ul class="ul-title-menutab">
                <li class="item-title-1"><a id="title1"><?php echo $instance['title1'] ?></a></li>
                <li class="item-title-2"><a id="title2"><?php echo $instance['title2'] ?></a></li>
            </ul>
            <div id="menutab-first" class="first-post-menutab">

				<?php
				$resultPost = new WP_Query( apply_filters( 'widget_post_args', array(
					'posts_per_page'      => 4,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'orderby'             => 'date',
					'order'               => 'DESC'
				) ) );
				if ( $resultPost->have_posts() ) {
					?>
                    <ul>
						<?php
						while ( $resultPost->have_posts() ) {
							$resultPost->the_post();
							?>
                            <li>
                                <div class="menutab-thumbnails"><?php gavinmeme_diplayThumbnailMenuTab( 'thumbnail' ); ?></div>
                                <div class="menutab-links">
                                    <a class="link-posts"
                                       href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                                    <div class="date-posts"><?php echo get_the_date(); ?></div>
                                </div>
                            </li>
							<?php
						}
						?>
                    </ul>
					<?php
				}
				?>
            </div>
            <div id="menutab-recent" class="recent-post-menutab">
				<?php
				$resultPost = new WP_Query( apply_filters( 'widget_post_args', array(
					'posts_per_page'      => 4,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'orderby'             => 'date',
					'order'               => 'ASC'
				) ) );
				if ( $resultPost->have_posts() ) {
					?>
                    <ul>
						<?php
						while ( $resultPost->have_posts() ) {
							$resultPost->the_post();
							?>
                            <li>
                                <div class="menutab-thumbnails"><?php gavinmeme_diplayThumbnailMenuTab( 'thumbnail' ); ?></div>
                                <div class="menutab-links">
                                    <a class="link-posts"
                                       href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                                    <div class="date-posts"><?php echo get_the_date(); ?></div>
                                </div>
                            </li>
							<?php
						}
						?>
                    </ul>
					<?php
				}
				?>
            </div>
        </div>
		<?php
		echo $args['after_widget'];
	}
}

function SidebarForPost() {
	register_sidebar( array(
		'name'          => __( 'Sidebar For Post By Gavin', 'gavinmeme' ),
		'id'            => 'sidebar-post',
		'description'   => __( 'Gavin is the best babe =))', 'gavinmeme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'SidebarForPost' );

add_filter( 'widgets_init', 'RelatedPostWidgetByKD' );
function RelatedPostWidgetByKD() {
	register_widget( 'RelatedPostWidget' );
}

class RelatedPostWidget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'related-post-grid',
			__( 'Related Post Grid', 'gavinmeme' ),
			array(
				'description' => __( 'Bài viết liên quan', 'gavinmeme' )
			) );
	}

	function form( $instance ) {
		$default  = array(
			'title' => 'Related Post',
		);
		$instance = wp_parse_args( $instance, $default );
		?>
        <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"
               value="<?php echo $instance['title']; ?>"/>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = $new_instance['title'];

		return $instance;
	}

	function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		?>
        <div class="related-post">
			<?php
			global $post;
			$listCategory = get_the_category( $post->ID );
			$cateID       = array();
			foreach ( $listCategory as $individual_category ) {
				$cateID[] = $individual_category->term_id;
			}
			$theQuery = new WP_Query( apply_filters( 'widget_post_args', array(
				'posts_per_page' => 4,
				'no_found_rows'  => true,
				'post_status'    => 'publish',
				'category__in'   => $cateID,
				'post__not_in'   => array( $post->ID ),
			) ) );
			if ( $theQuery->have_posts() ) {
				?>
                <ul id="list-related-post">
					<?php
					while ( $theQuery->have_posts() ) {
						$theQuery->the_post();
						?>
                        <li>
                            <div class="related-site-main">
                                <div class="related-post-thumbnails"><?php gavinmeme_diplayThumbnailMenuTab( 'thumbnail' ); ?></div>
                                <div class="related-post-links">
                                    <a class="link-posts"
                                       href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>

                                    <div class="date-posts">
										<?php
										if ( comments_open() ) {
											echo '<span class="related-post-reply">';
											comments_popup_link(
												__( 'No Comments', 'gavinmeme' ),
												__( 'One a comment', 'gavinmeme' ),
												__( '% comments', 'gavinmeme' ),
												__( 'Read all comments', 'gavinmeme' )
											);
											echo '</span> | ';
										}
										?><?php echo get_the_date(); ?></div>
                                </div>
                            </div>

                        </li>
						<?php
					}
					?>
                </ul>
				<?php
			}
			?>
        </div>
		<?php
		echo $args['after_widget'];
	}
}

function post_class2( $class = '', $post_id = null ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class=" post-no-border ' . join( ' ', get_post_class( $class, $post_id ) ) . '"';
}

add_filter( 'widgets_init', 'InfoAuthorByGavin' );
function InfoAuthorByGavin() {
	register_widget( 'InfoAuthor' );
}

class InfoAuthor extends WP_Widget {
	function __construct() {
		parent::__construct( 'widget-info-author-gavinmeme',
			__( 'Information Author By Gavin', 'gavinmeme' ),
			array( 'description' => __( 'Show Profile Of Author =))', 'gavinmeme' ) ) );
	}

	function form( $instance ) {
		$default  = array(
			'title' => 'AUTHOR'
		);
		$instance = wp_parse_args( $instance, $default );
		?>
        <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"
               value="<?php echo $instance['title']; ?>"/>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = $new_instance['title'];

		return $instance;
	}

	function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		global $post;
		$authorID = get_the_author_meta( 'ID' );
		?>
        <div class="info-author">
            <div class="avatar-author"><?php echo get_avatar($authorID); ?></div>
            <div class="detail-author">
                <h5 class="info-author-name"><?php echo get_the_author( $post->ID ); ?></h5>
                <div class="biographical-aithor"><?php echo get_the_author_meta( 'description' ); ?></div>
            </div>
        </div>
		<?php
		echo $args['after_widget'];
	}
}








