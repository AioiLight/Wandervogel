<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <h1 class="blog-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="blog-description"><?php bloginfo( 'description' ); ?></p>
        </header>

        <div class="body">
            <main class="grid-item">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <article>
                    <h2 class="post-title"><a href="<?php the_permalink( $post ); ?>"><?php the_title(); ?></a></h2>

                    <?php the_content(); ?>
                </article>
                <?php endwhile; endif; ?>
            </main>

            <div class="side grid-item">
                <?php dynamic_sidebar(); ?>
            </div>
        </div>

        <footer>
            <p class="blog-copyright">(c) 2020 Author</p>
            <p class="blog-powered">Powered by WordPress and Love &lt;3 </p>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>