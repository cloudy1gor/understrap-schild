<?php
/*
 * Carousel template to show slider
 * */
?>

<section class="bs-carousel">
    <div class="container-fluid">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <div class="container">
	                <?php
	                $query = new WP_Query([
		                'post_type' => 'carousel',
		                'posts_per_page' => 3
	                ]);

	                $i = 0;
	                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		                ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?> aria-label="Slide <?php echo $i + 1; ?>"></button>
		                <?php
		                $i++;
	                endwhile;
	                endif;
	                ?>
                </div>
            </div>

            <div class="carousel-inner">

			    <?php
                    $args = array('post_type' => 'carousel', 'posts_per_page' => 3);
                    $query = new WP_Query($args);
                    $i = 0;
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                ?>

                    <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">

	                    <?php
	                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
	                    $url = $thumb['0'];
	                    ?>

                        <img src="<?php echo $url; ?>" class="d-block w-100" alt="...">

                        <div class="carousel-caption d-none container">
                            <h5>
                                <?php echo '<a class="carousel__link" href="' . get_permalink() . '">' . esc_html( get_the_title() ) . '</a>'; ?>
                            </h5>

                            <span>
                                <?php echo get_the_date(); ?> <bold>By</bold> <?php echo get_the_author(); ?>
                            </span>
                        </div>

                    </div>

                <?php
                    $i++;
                    endwhile;
                    endif;
                    wp_reset_postdata();
			    ?>
            </div>

        </div>

    </div>
</section>