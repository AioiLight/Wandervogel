<?php get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <section>
                    <h2>タグ: <?php single_tag_title(); ?></h2>
                    <p><?php tag_description(); ?></p>
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
                
            <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>