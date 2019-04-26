<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#page" class="logo nav-link">
                        <?php eco_logo() ?>
                    </a>
                </div>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main',
                            'container' => false,
                            'menu_class'     => 'col-md-9 row align-items-center justify-content-end',
                            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                            'walker' => new Ecomaster_Walker_Nav_Menu()
                        )
                    );
                ?>
            </div>
        </div>
    </nav>
    <header class="header">
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'header',
                    'container' => false,
                    'items_wrap'     => '<div class="container"><div class="row no-gutters">%3$s</div></div>',
                    'walker' => new Ecomaster_Walker_Header_Nav_Menu()
                )
            );
        ?>
    </header>
	<div>
		<div>
