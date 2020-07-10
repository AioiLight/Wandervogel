<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo( 'name' ); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div class="blog-title header-link"><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></div>
            <p class="blog-description"><?php bloginfo( 'description' ); ?></p>
        </header>