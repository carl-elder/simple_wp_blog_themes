<?php
if(!function_exists('aero_carousel')):
    function aero_carousel(){

        $args = array(
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'post_count'    => '5',
            'order'         => 'DESC',
            'orderby'       => 'date',
            'meta_key'      => '_aero_featured_slider',
            'meta_value'    => '1'
        );
        $query = new WP_Query($args);

        if($query->have_posts()) {
            $i = 0;
            ?><div id="homeSlider" class="carousel" data-ride="carousel"><div class="carousel-inner" role="listbox"><?php
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                <div class="carousel-item<?php if($i === 0) echo ' active' ?>">
                    <img src="<?php the_post_thumbnail_url('slider') ?>" alt="<?php the_title() ?>">
                    <div class="carousel-caption">
                        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title(); ?></a>
                    </div>
                </div>
                <?php
                $i++;
            } ?>
                <a class="carousel-control-prev" href="#homeSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#homeSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div></div><?php
        }
        wp_reset_query();
    }
    aero_carousel();
endif;