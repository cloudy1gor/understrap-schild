<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */
?>

<footer class="footer" id="colophon">
    <nav class="navbar d-flex flex-column">
        <div class="container flex-column">

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

            <div class="d-flex flex-row">
				<?php
				echo (wp_nav_menu(
					array(
						'theme_location'  => 'secondary',
						'menu_class'      => 'navbar-nav d-flex flex-row',
						'menu_id'         => 'footer-menu',
						'fallback_cb'     => '',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				));
				?>
            </div>

        </div>

        <?php
        //Get value from Settings page with id 6
        $copyright = get_post_meta( 6, '_wporg_meta_key_copyright', true );

        if ( ! empty( $copyright ) ) {
            echo '<div class="footer__bottom align-self-center">&copy; ' . get_the_date( 'Y' ) . ' ' . esc_html( $site_name ) . ' ' . esc_html( $copyright ) . '</div>';
        } else {
            echo '<div class="footer__bottom align-self-center">&copy; ' . get_the_date( 'Y' ) . ' ' . bloginfo( 'name' ) . ' All rights reserved.</div>';
        }
        ?>

    </nav>

</footer>

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

