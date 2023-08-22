<?php get_header(); $count = 0; ?>
        <div class="body">
            <main class="grid-item">
                <section>
                    <h1>カテゴリ: <?php single_cat_title(); ?></h1>
                    <p><?php echo category_description(); ?></p>

                    <div class="index-grid header-link">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <a href="<?php the_permalink( $post ); ?>">
                            <article class="article-card">
                                <?php if (has_post_thumbnail()) : ?>
                                <?= the_post_thumbnail('medium', array('loading' => ($count >= 4) ? 'lazy' : false)); ?>
                                <?php else: ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eyecatch.png"<?php if($count >= 4): ?> loading="lazy"<?php endif; ?>>
                                <?php endif; ?>
                                <div>
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                </div>
                            </article>
                        </a>
                        <?php $count++; endwhile; endif; ?>
                    </div>
                </section>

                <?php get_template_part( 'parts/post-nav' ); ?>
            </main>
                
            <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>