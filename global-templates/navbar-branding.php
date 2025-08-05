<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! has_custom_logo() ) { ?>

	<?php if ( is_front_page() && is_home() ) : ?>

		<h1 class="navbar-brand mb-0">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>

	<?php else : ?>

		<a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
			<!-- ag: adding the logo here -->
			<img class="navbar-brand-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gnome-logo-pr-blue.svg" alt="Site Logo" height="40" style="">
			<span class="site-title"><?php bloginfo( 'name' ); ?></span>
		</a>

	<?php endif; ?>

	<?php
} else {
	the_custom_logo();
}
