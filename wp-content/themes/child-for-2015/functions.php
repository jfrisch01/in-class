<?php
//This will ADD ON to the functions file of the parent theme

/**
 * Add a widget area for the footer
 */
add_action( 'widgets_init', 'child_widget_areas' );
function child_widget_areas(){
	register_sidebar( array(
		'name' => 'Footer Widgets',
		'id'   => 'footer-widgets',
		'before_widget' => '<section class="widget">',
		'after_widget'	=> '</section>',
	) );
}
//no close php