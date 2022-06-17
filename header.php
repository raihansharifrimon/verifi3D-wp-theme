<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BSS_Verifi3D
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bss_verifi3d' ); ?></a>

	<header id="masthead" class="bss-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-3 col-sm-6">
					<div class="bss-header__logo">
						<?php
							the_custom_logo();								
						?>
					</div>
				</div>
				<div class="col-xl-9 col-sm-6">
					<button class="btn btn-outline-white mobile-menu__btn" id="mobileMenutoggler">
						<span><i class="fa fa-bars"></i></span>
					</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'	 => 'bss-header__nav-inner'
							)
						);
						?>
				</div>
			</div>
		</div>
	</header>
