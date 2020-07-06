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
                <?php if (is_home()): ?>
                    <div class="index-grid header-link">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <a href="<?php the_permalink( $post ); ?>">
                            <article class="article-card">
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_date(); ?></p>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                        </a>
                        <?php endwhile; endif; ?>
                    </div>

                    <?php posts_nav_link(' ', '<span class="button theme">新しめの投稿</span>', '<span class="button theme">古めの投稿</span>'); ?>
                <?php else: ?>
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <article>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                        
                        <?php
                            $category = get_the_category();
                            $html = '<div class="post-category">カテゴリ: ';
                            $html .= '<a href="' . get_category_link( $category[0]-> term_id ) . '" title="' . $category[0]->cat_name . '"><span class="tag theme">';
                            $html .= $category[0]->cat_name . '</span></a>';
                            echo $html;
                        ?>
                        <?php
                            $tags = get_the_tags();
                            $html = '<div class="post-tags">タグ: ';
                            if ( $tags ) {
                                foreach ( $tags as $tag ) {
                                    $tag_link = get_tag_link( $tag->term_id );
                                            
                                    $html .= '<a href="' . $tag_link . '" title="' . $tag->name . '"><span class="tag theme">';
                                    $html .= $tag->name . '</span></a>';
                                }
                            }
                            $html .= '</div>';
                            echo $html;
                        ?>

                        <?php the_content(); ?>
                    </article>
                    <?php endwhile; endif; ?>
                <?php previous_post_link( '%link', '<span class="button theme">前: %title</span>'); ?>
                <?php next_post_link( '%link', '<span class="button theme">次: %title</span>'); ?>
                <?php endif; ?>
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