<?php get_header(); ?>
    <div class="container">
        <main>
            <?php
            $pages = get_pages();

            foreach( $pages as $post ):
                setup_postdata( $post );

                get_template_part( 'templates/content-page', get_post_type() );
            endforeach;

            wp_reset_postdata();
            ?>
        </main>
    </div>
<?php get_footer(); ?>
