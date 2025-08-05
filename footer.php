<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php // get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<!-- ag: front page menu will be different from the other pagesc -->
<?php if(is_front_page()){ ?>

	<div class="wrapper" id="wrapper-footer">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-12">

					<footer class="site-footer" id="colophon">

						<div class="site-info">

							<?php awd_custom_site_info(); ?>

						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!-- col -->

			</div><!-- .row -->

		</div><!-- .container(-fluid) -->

	</div><!-- #wrapper-footer -->

<?php }elseif(is_page('hire-me')){ ?>
	<div class="wrapper" id="wrapper-footer">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-12">

					<footer class="site-footer" id="colophon">

						<a href="<?= get_site_url() ?>"><img class="hire-me-footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gnome-face-logo-accent-red.svg" alt="gnome-logo"></a>

						<div class="site-info text-align-center">

							<?php awd_custom_site_info(); ?>

						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!-- col -->

			</div><!-- .row -->

		</div><!-- .container(-fluid) -->

	</div><!-- #wrapper-footer -->

<?php }else{ ?>
	<div class="" id="wrapper-footer">

		<footer id="site-footer">

			<!-- Top Footer Section -->
			<div class="footer-top">
				<div class="footer-container">
					<!-- <div class="footer-column">
						<h4>About</h4>
						<p>Located in the Greater Washington DC area & New England</p>
						<ul class="footer-checklist">
						<li>✔ Industry leading</li>
						<li>✔ Over 5 years of experience</li>
						<li>✔ Ranked #1 by #1 clients</li>
						</ul>
					</div> -->

					<div class="footer-column">
						<h4>Pages</h4>
						<ul class="footer-links">
							<?php
								wp_nav_menu([
									'theme_location' => 'primary',
									'menu_class'     => 'nav-menu',
									'container'      => false,
									'menu-id'		=> 'main-menu'
								]);
							?>
						</ul>
					</div>

					<div class="footer-column latest-blog-posts">
						<h4>Latest Blog Posts</h4>

						<?php
						$num_posts = wp_is_mobile() ? 3 : 5;

						$recent_posts = new WP_Query([
							'post_type' 		=> 'post',
							'posts_per_page' 	=> $num_posts,
							'orderby' 			=> 'rand',
						]);

						if ($recent_posts->have_posts()):						
							while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
								<div class="mb-2">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
								</div>
							<?php endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>

			<!-- Bottom Bar -->
			<div class="footer-bottom">
				<div class="footer-container">
					<div class="copyright">
						&copy; <?php echo date('Y'); ?> Abel Web Development. All rights reserved.
					</div>
					<!-- <div class="social-icons">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-linkedin-in"></i></a>
					</div> -->
				</div>
			</div>
		</footer>

	</div><!-- #wrapper-footer -->


<?php } ?>


<?php wp_footer(); ?>

</body>

</html>

