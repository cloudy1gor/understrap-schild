<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <div class="wrapper" id="index-wrapper">

        <div class="row">

            <?php if ( is_single() ) : ?>
                <?php get_template_part('template-parts/section', 'carousel'); ?>
            <?php endif; ?>

            <div class="container">

                <div class="row main-wrapper">

                    <div class="col-md-8">
                        <main class="main" id="main">

                            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                                <header class="entry-header">

                                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

                                </header><!-- .entry-header -->

                                <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

                                <div class="entry-content">

                                    <?php
                                    the_content();
                                    understrap_link_pages();
                                    ?>

                                </div><!-- .entry-content -->

                                <footer class="entry-footer">

                                    <?php understrap_entry_footer(); ?>

                                </footer><!-- .entry-footer -->

                            </article><!-- #post-<?php the_ID(); ?> -->


                        </main>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex justify-content-end">
                            <?php get_sidebar('sidebar.php'); ?>
                        </div>
                    </div>

                </div> <!-- .row -->

            </div> <!-- .container -->

        </div><!-- .row -->

    </div><!-- #wrapper -->

<?php
get_footer();
