<?php
    function eco_section_title($type = 'h1') {
        $words = explode(' ', get_the_title());

        echo sprintf('<%1$s>%2$s</%1$s>%3$s', $type, array_shift($words), join(' ', $words));
    }

    function eco_logo () {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );

        echo "<img src='".esc_url($custom_logo_url)."' class='img-fluid' alt=''>";
    }