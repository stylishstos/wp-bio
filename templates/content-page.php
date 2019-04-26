<section id="<?= get_post_field( 'post_name', get_post() ) ?>">
    <?php if(has_post_thumbnail() ): ?>
        <div class="banner">
            <img src="<?=get_the_post_thumbnail_url() ?>" class="img-fluid">
            <span class="text">
                <?php eco_section_title() ?>
            </span>
        </div>
    <?php else: ?>
        eco_section_title()
    <?php endif; ?>

    <div class="px-4">
        <?php the_content() ?>
    </div>
</section>