<?php

if(!function_exists('aero_meta')):
    function aero_meta($post)
    {
        // make sure the form request comes from WordPress
        wp_nonce_field( basename( __FILE__ ), 'aero_meta_box_nonce' );

        // retrieve the _aero_featured_slider current value
        $feature_slider = get_post_meta( $post->ID, '_aero_featured_slider', true );

        ?>
        <input type="checkbox" name="_aero_featured_slider" value="1" <?php checked( $feature_slider, 1 ); ?> /><?php echo '&nbsp;Add this post to home slider.'; ?> <br />
        <?php
    }
endif;

if(!function_exists('aero_add_meta_boxes')):
    function aero_add_meta_boxes($post)
    {
        add_meta_box('aero_meta', __('Feature Post?', 'aero'), 'aero_meta', 'post', 'side', 'high');
    }
    add_action('add_meta_boxes', 'aero_add_meta_boxes');
endif;

if(!function_exists('aero_save_meta')):
    function aero_save_meta($post_id, $post)
    {
        /* Verify the nonce before proceeding. */
        if ( !isset( $_POST['aero_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['aero_meta_box_nonce'], basename( __FILE__ ) ) )
            return $post_id;

        /* Get the post type object. */
        $post_type = get_post_type_object( $post->post_type );

        /* Check if the current user has permission to edit the post. */
        if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
            return $post_id;

        /* Get the posted data and sanitize it for use as an HTML class. */
        $new_meta_value = ( isset( $_POST['_aero_featured_slider'] ) ? sanitize_html_class( $_POST['_aero_featured_slider'] ) : '$_POST[\'_aero_featured_slider\']' );

        /* Get the meta key. */
        $meta_key = '_aero_featured_slider';

        /* If the new meta value does not match the old value, update it. */
        if (  isset( $new_meta_value ) )
            update_post_meta( $post_id, $meta_key, $new_meta_value );
    }
    add_action( 'save_post', 'aero_save_meta');
endif;
