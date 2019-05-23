<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Coffee_Can
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-coffee-can' ); ?></a>

    <!--    header image-->
    <?php if (get_header_image() && is_front_page()) : ?>
        <div class="site-header-image">
            <figure class="header-image">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>"
                         height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="">
                </a>
            </figure>
        </div>

    <?php endif; // End header image check. ?>

    <div class="top-ribbon">
<!--        <div class="call-to-action">-->
<!--            --><?php
//            wp_nav_menu(array(
//                'theme_location' => 'call-to-action',
//                'menu_id' => 'call-to-action-menu',
//            ));
//            ?>
<!---->
<!--        </div>-->

    </div>





	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$the_coffee_can_description = get_bloginfo( 'description', 'display' );
			if ( $the_coffee_can_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $the_coffee_can_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>

            <div class="social-nav-bar">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'social',
                    'menu_id' => 'social-menu',
                ));
                ?>
            </div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'the-coffee-can' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>



		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
