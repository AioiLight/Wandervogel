<?php get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <div class="index-grid header-link">
                    <?php 
                    $count = 0;
                    if(have_posts()): while(have_posts()): the_post(); ?>
                    <a href="<?php the_permalink( $post ); ?>">
                        <article class="article-card">
                            <?php if (has_post_thumbnail()) : ?>
                            <?= the_post_thumbnail('medium', array('loading' => ($count >= 4) ? 'lazy' : false)); ?>
                            <?php else: ?>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eyecatch.png"<?php if($count >= 4): ?> loading="lazy"<?php endif; ?>>
                            <?php endif; ?>
                            <h1><?php the_title(); ?></h1>
                            <?php the_excerpt(); ?>
                        </article>
                    </a>
                    <?php $count++; endwhile; endif; ?>
                </div>
                <div class="article-footer">
                    <?php get_template_part( 'parts/post-nav' ); ?>
                </div>
            </main>
            
            <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>