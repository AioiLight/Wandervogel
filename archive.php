<?php get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <section>
                    <h2>アーカイブ: <?php wp_title(); ?></h2>
                    <p><?php echo category_description(); ?></p>

                    <div class="index-grid header-link">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <a href="<?php the_permalink( $post ); ?>">
                            <article class="article-card">
                                <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                                <?php else: ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eyecatch.png">
                                <?php endif; ?>
                                <div>
                                    <h2><?php the_title(); ?></h2>
                                    <p><?php echo get_the_date(); ?></p>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </article>
                        </a>
                        <?php endwhile; endif; ?>
                    </div>
                </section>

                <?php get_template_part( 'parts/post-nav' ); ?>
            </main>
                
            <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>