<?php get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <article>
                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <?php the_content(); ?>
                </article>
                <?php endwhile; endif; ?>
            </main>
                
            <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>