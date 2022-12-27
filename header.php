<?php 
$desc = get_pages_description();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title('|', true, 'right'); bloginfo( 'name' ); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $desc ?>">
        <meta property="og:url" content="<?php echo is_singular() ? get_permalink() : home_url(); ?>">
        <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo( 'name' ); ?>">
        <meta property="og:type" content="<?php echo (is_front_page() || is_home()) ? 'website' : 'article'; ?>">
        <meta property="og:description" content="<?= $desc ?>">
        <meta property="og:image" content="<?php echo is_singular() && has_post_thumbnail() ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0] : get_stylesheet_directory_uri() . '/images/eyecatch.png'; ?>">
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@aioilight">
        <meta property="og:locale" content="ja_JP">

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        <link rel="alternate" href="<?php bloginfo('atom_url'); ?>" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> のフィード" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div class="blog-title header-link"><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></div>
            <p class="blog-description"><?php bloginfo( 'description' ); ?></p>
        </header>