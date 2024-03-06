<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php do_action( 'wp_body_open' ); ?>

<div class="site" id="page">

	<header id="wrapper-navbar">
    <div class="container-fluid container__fluid--max">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <?php
                // Get value form Settings page with id 6
                $site_name = get_post_meta( 6, '_wporg_meta_key_site_name', true );

                if ( ! empty( $site_name ) ) {

                    echo '<a class="navbar-brand logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( $site_name ) . '</a>';

                } else {

                    if ( is_front_page() && is_home() ) { ?>
                        <a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    <?php }

                } ?>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

				    <?php
				    echo (wp_nav_menu(
					    array(
						    'theme_location'  => 'primary',
						    'container_class' => 'collapse navbar-collapse',
						    'container_id'    => 'navbarSupportedContent',
						    'menu_class'      => 'navbar-nav ms-auto',
						    'fallback_cb'     => '',
						    'menu_id'         => 'header-menu',
						    'depth'           => 2,
						    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					    )
				    ));
				    ?>

            </div>

        </nav>
    </div>

    </header>

