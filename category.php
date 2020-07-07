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
            <h1 class="blog-title header-link"><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="blog-description"><?php bloginfo( 'description' ); ?></p>
        </header>

        <div class="body">
            <main class="grid-item">
                <section>
                    <h2>カテゴリ: <?php single_cat_title(); ?></h2>
                    <p><?php echo category_description(); ?></p>

                    <div class="index-grid header-link">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <a href="<?php the_permalink( $post ); ?>">
                            <article class="article-card">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_date(); ?></p>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                        </a>
                        <?php endwhile; endif; ?>
                    </div>
                </section>

                <?php posts_nav_link(' ', '<span class="button theme">新しめの投稿</span>', '<span class="button theme">古めの投稿</span>'); ?>
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