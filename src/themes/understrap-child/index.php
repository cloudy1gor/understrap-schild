<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="index-wrapper">

    <div class="row">

		<?php if (is_front_page() && is_home()) : ?>
			<?php get_template_part('template-parts/section', 'carousel'); ?>
		<?php endif; ?>

        <div class="container">

            <div class="row main-wrapper">

                <div class="col-md-8">
                    <main class="main" id="main">

			            <?php get_template_part('template-parts/section', 'content'); ?>

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

</div><!-- #index-wrapper -->

<?php
get_footer();
