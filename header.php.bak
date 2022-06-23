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

	<header>
        <nav class="navbar navbar-expand-lg navbar-dark py-3" id="logoSwitcher">
            <div class="w-100 px-4">
				<div class="row">
					<div class="col-lg-2">
						<div class="d-flex justify-content-between align-item-center">
							<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							?>
						<a class="navbar-brand" href="index.html">
							<img width="100px" id="logo" height="35px" src="<?= $logo[0] ?>"
								alt="logo">
							<img width="100px" id="stickyLogo" height="35px" src="<?= $logo[0] ?>" alt="logo">
						</a>

						<button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent">
							<i class="fa fa-bars"></i>
						</button>
						</div>
					</div>
					<div class="col-lg-10">						
						<div class="collapse navbar-collapse h-100 justify-content-end" id="navbarSupportedContent">
							<?php 
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'menu_class'	 => 'nav-inner',

									)
								);
								
							?>
						</div>
					</div>
				</div>
            </div>
        </nav>
    </header>

