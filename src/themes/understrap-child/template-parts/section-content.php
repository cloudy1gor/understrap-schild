<?php
/*
 * Content template to show all latest posts
 * */
?>


<section class="content">
    <div class="container">
        <div class="content__body">

            <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'posts_per_page' => 6,
                'paged' => $paged,
            );

            $custom_query = new WP_Query( $args );

            if ( $custom_query->have_posts() ) {
                $count = 0;
                while ( $custom_query->have_posts() ) {
                    $custom_query->the_post();
                    if ( $count % 2 == 0 ) {
                        echo '<div class="row">';
                    }
                    ?>
                    <div class="col">
                        <div class="card">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                            <?php } ?>
                            <div class="card-body">
                                <?php
                                $categories = get_the_category();
                                if ( !empty( $categories ) ) {
                                    $category = esc_html( $categories[0]->name );
                                    ?>
                                    <span class="card__category d-flex justify-content-center"><?php echo $category; ?></span>
                                <?php } ?>
                                <h5 class="card-title d-flex justify-content-center">
                                    <a href="<?php the_permalink(); ?>"><?php esc_html( the_title() ); ?></a>
                                </h5>
                                <div class="card-box d-flex justify-content-center">
                                    <span><?php echo get_the_date(); ?> <bold>By</bold> <?php echo get_the_author(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                    if ( $count % 2 == 0 ) {
                        echo '</div>';
                    }
                }
                if ( $count % 2 != 0 ) {
                    echo '</div>';
                }
            }
            ?>

        </div>
    </div>

    <!--Pagination-->
    <div class="content__pagination d-flex justify-content-center">
		<?php
        understrap_pagination( $args = [
            'total' => $custom_query->max_num_pages,
            'current' => $paged,
            'base' => get_pagenum_link( 1 ) . '%_%',
            'format' => '?paged=%#%',
            'show_all' => false,
            'end_size' => 1,
            'mid_size' => 2,
            'prev_next' => true,
            'prev_text' => __( '< OLDER POST' ),
            'next_text' => __( 'NEXT POST >' ),
        ] );
        ?>
    </div>

</section>
