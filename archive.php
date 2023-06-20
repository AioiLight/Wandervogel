<?php 
$y = get_the_time('Y');
$m = get_the_time('n');
get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <section>
                    <?php if (is_year()): ?>
                    <h1><?= $y ?> 年の記事一覧</h1>
                    <?php else: ?>
                    <h1><a href="<?= get_year_link($y); ?>"><?= $y ?> 年</a> <?= $m ?> 月の記事一覧</h1>
                    <?php endif; ?>

                    <div class="index-grid header-link">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <a href="<?php the_permalink( $post ); ?>">
                            <article class="article-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php
                                    $tid = get_post_thumbnail_id();
                                    $timg = wp_get_attachment_image_src($tid, 'full');
                                    echo $timg[0];?>" loading="lazy">
                                <?php else: ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eyecatch.png" loading="lazy">
                                <?php endif; ?>
                                <div>
                                    <h2><?php the_title(); ?></h2>
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