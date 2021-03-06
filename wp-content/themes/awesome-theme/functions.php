<?php
//use this file for custom functions and activating 'sleeping' wordpress features
//allow you to attach a "featured image" to each post or page
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array( 'audio', 'video', 'image'));

//required for good Comment UX
add_action('wp_enqueue_scripts', 'awesome_scripts');
function awesome_scripts(){
	if ( is_singular() ) wp_enqueue_script( 'comment-reply');
}

add_theme_support('custom-background');
//dont forget to display the custom header in header.php
//add_theme_support('custom-header', array(
//					'width' => 200,
//					'height' => 200,
//					));

//activated html5 forms - better for mobile devices
add_theme_support('html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'comment-list') );

//add <link> elements in the head to your feeds
add_theme_support('automatic-feed-links' );

//required since 4.1
add_theme_support( 'title-tag' );


add_image_size('post-thumbnails');

add_image_size( 'big-banner', 1300, 300, true );

//allows you to style the editor window with editor-style.css
add_editor_style();


/**
 * Improve Excerpts - change the length and annoying [...]
 */
function awesome_ex_length(){
	//uses user agaent strings to detect a "mobile" device
	if (wp_is_mobile()) {
		return 10;
	}else{
		return 70;
	}
}

add_filter('excerpt_length', 'awesome_ex_length');

function awesome_readmore(){
	return '<a href="' . get_permalink() . '" class="readmore">Read More</a>';
}
add_filter( 'excerpt_more', 'awesome_readmore');

/**
 * Menu Areas
 * Register 2 menu areas
 * display them in your theme with wp_nav_menu
 */
add_action('init', 'awesome_menus');
function awesome_menus(){
	register_nav_menus( array(
		//'code name' => 'Human Readable',
		'main_nav' => 'Main Navigation Area',
		'utilities' => 'Utility and Social Icons',
		) );
}

/**
 * Add Widget Areas (Dynamic Sidebars)
 */

add_action( 'widgets_init', 'awesome_widget_areas');
function awesome_widget_areas(){
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog sidebar',
		'description' => 'Appears alongside all blog and archive pages',
		'before_widget' => '<section class="widget %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Home Area',
		'id' => 'home_area',
		'description' => 'Appears in the middle of the home page content',
		'before_widget' => '<section class="widget %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'page_sidebar',
		'description' => 'Appears Appears alongside pages',
		'before_widget' => '<section class="widget %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Area',
		'id' => 'footer_area',
		'description' => 'Appears at the bottom of everything',
		'before_widget' => '<section class="widget %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/**
 * Display a set of products with thumbnail images
 * @param int $number - the number of posts to show
 */
function awesome_show_products( $number = 4 ){
	//custom query to get up to 6 recent products
	$products_query = new WP_Query( array(
		'post_type' 		=> 'product', //we registered this in our products plugin
		'posts_per_page'	=> $number,	
	) );
	if( $products_query->have_posts() ):
	 ?>

	<section class="latest-products">
		<h2>Newest Products in the shop:</h2>
		<ul>
			<?php while( $products_query->have_posts() ): 
				$products_query->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<div class="product-info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; 
	//prevent clashing with other loops
	wp_reset_postdata();
}//end of function



/**
 * Exclude a specific category from the blog loop
 * Example of how to use pre_get_posts
 */
//add_action( 'pre_get_posts', 'awesome_hide_category' );
function awesome_hide_category( $query ){
	//only if on the main query on the blog
	if( $query->is_home() && $query->is_main_query() ):
		$query->set( 'cat', '-1' );
	endif;
}

/**
 * Theme Customization API example - add custom text and link colors
 */
add_action( 'customize_register', 'awesome_theme_customizer');
function awesome_theme_customizer( $wp_customize ){
	//link color
	$wp_customize->add_setting( 'awesome_link_color', array(
		'default' => '#6bcbca',
	) );
	//UI for link color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'awesome_link_color_picker',
		array( 
			'section' => 'colors', //this is one of the default sections, you can DIY
			'settings' => 'awesome_link_color',
			'label' => 'Link Color',
		)

	) );

}

//CSS for customization
add_action('wp_head', 'awesome_customizer_css' );
function awesome_customizer_css(){
	?>
	<style type="text/css">
	a{
		color:<?php echo get_theme_mod( 'awesome_link_color'); ?>; 
	}
	</style>
	<?php
}

//no close PHP!





