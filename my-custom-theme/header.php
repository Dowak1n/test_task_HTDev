<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>
    <nav>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => '',
                'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
                'walker' => new Custom_Walker_Nav_Menu(),
            ) );
        ?>
    </nav>
</header>
<main>