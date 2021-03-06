<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			
		<?php 
		//run our rad slider plugin if it exists
		if(function_exists('rad_slider')):
			rad_slider();
		else:
			//show the featured image
			the_post_thumbnail( 'big-banner' );  
		endif;
		?>

			<h2 class="home-quote"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			

			<div class="entry-content">
				<?php the_content();	?>
			</div>
			
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

	<?php awesome_show_products( 6 ); //defined in functions.php ?>




</main><!-- end #content -->

<?php get_sidebar('home'); //include sidebar-home.php ?>
<?php get_footer(); //include footer.php ?>