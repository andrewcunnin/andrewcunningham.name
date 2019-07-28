<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package andrews_theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<nav id="site-navigation" class="main-navigation">
				<?php if(is_front_page() || is_home()): ?>
				<button class="menu-toggle" aria-controls="main-primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'andrews-theme' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'main-primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if(!is_home() && !is_front_page()):
get_sidebar();
endif;
get_footer();
