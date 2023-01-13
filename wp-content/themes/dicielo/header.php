<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	    <!-- using google font + Century Gothic -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
		<!-- Didact Gothic -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;700&display=swap" rel="stylesheet">
	    <!-- font awesome -->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- slick carousel  -->
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
		<!-- use fullwidth header for carousel if home page 
		< ? php if( is_home() ) { ?>
		<div> … </div>
		< ?php } ?>
		-->
		<header id="site-header" class="header-footer-group" role="banner">
			<div class="container">
				<div class="header-inner section-inner">

					<div class="header-titles-wrapper">

						<?php

						// Check whether the header search is activated in the customizer.
						$enable_header_search = get_theme_mod( 'enable_header_search', true );

						if ( true === $enable_header_search ) {

							?>

							<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
								<span class="toggle-inner">
									<span class="toggle-icon">
										<?php twentytwenty_the_theme_svg( 'search' ); ?>
									</span>
									<span class="toggle-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
								</span>
							</button><!-- .search-toggle -->

						<?php } ?>

						<div class="header-titles">

							<?php
								// Site title or logo.
								twentytwenty_site_logo();

								// Site description.
								twentytwenty_site_description();
							?>

						</div><!-- .header-titles -->

						<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
								</span>
								<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
							</span>
						</button><!-- .nav-toggle -->

					</div><!-- .header-titles-wrapper -->

					<div class="header-navigation-wrapper">

						<?php
						if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
							?>

								<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">

									<ul class="primary-menu reset-list-style">

									<?php
									if ( has_nav_menu( 'primary' ) ) {

										wp_nav_menu(
											array(
												'container'  => '',
												'items_wrap' => '%3$s',
												'theme_location' => 'primary',
											)
										);

									} elseif ( ! has_nav_menu( 'expanded' ) ) {

										wp_list_pages(
											array(
												'match_menu_classes' => true,
												'show_sub_menu_icons' => true,
												'title_li' => false,
												'walker'   => new TwentyTwenty_Walker_Page(),
											)
										);

									}
									?>

									</ul>

								</nav><!-- .primary-menu-wrapper -->

							<?php
						}

						if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
							?>

							<div class="header-toggles hide-no-js">

							<?php
							if ( has_nav_menu( 'expanded' ) ) {
								?>

								<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

									<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
										<span class="toggle-inner">
											<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
											<span class="toggle-icon">
												<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
											</span>
										</span>
									</button><!-- .nav-toggle -->

								</div><!-- .nav-toggle-wrapper -->

								<?php
							}

							if ( true === $enable_header_search ) {
								?>

								<div class="toggle-wrapper search-toggle-wrapper">

									<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
										<span class="toggle-inner">
											<?php twentytwenty_the_theme_svg( 'search' ); ?>
											<!--<span class="toggle-text">< ?php _e( 'Search', 'twentytwenty' ); ?></span>-->
										</span>
									</button><!-- .search-toggle -->

								</div>

								<?php
							}
							?>

							</div><!-- .header-toggles -->
							<?php
						}
						?>
						<!-- basket icon -->
						<div>
							<a href="<?php echo wc_get_cart_url(); ?>">
								<i class="fas fa-shopping-cart"></i>
							</a>
						</div>
					</div><!-- .header-navigation-wrapper -->
				</div><!-- .header-inner -->
			</div>
			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>

		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
