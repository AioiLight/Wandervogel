<?php get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <?php if (is_home()): $count = 0;?>
                    <div class="index-grid header-link">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
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

                    <?php get_template_part( 'parts/post-nav' ); ?>
                <?php else: ?>
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <article>
                        <h1 class="post-title"><?php the_title(); ?></h1>

                        <div class="post-info">                            
                            <?php
                                $category = get_the_category();
                                $html = '<div class="post-category"><span class="icons icons-folder-open"></span> ';
                                $html .= '<a href="' . get_category_link( $category[0]-> term_id ) . '" title="' . $category[0]->cat_name . '">';
                                $html .= $category[0]->cat_name . '</a></div>';
                                echo $html;
                            ?>
                            <?php
                                $tags = get_the_tags();
                                $html = '<div class="post-tags"><span class="icons icons-label"></span> ';
                                if ( $tags ) {
                                    foreach ( $tags as $tag ) {
                                        $tag_link = get_tag_link( $tag->term_id );
                                                
                                        $html .= '<span><a href="' . $tag_link . '" title="' . $tag->name . '">';
                                        $html .= $tag->name . '</a></span>';
                                    }
                                }
                                $html .= '</div>';
                                echo $html;
                            ?>
                        </div>

                        <?php the_content(); ?>
                    </article>
                    <?php if (is_single()) : ?>
                        <div>
                            <?php 
                            $created = explode('/', get_the_date('Y/n/j'));
                            $modified = explode('/', get_the_modified_date('Y/n/j'));
                            ?>
                            <div class="post-date"><span>作成: <time datetime="<?= sprintf('%d-%02d-%02d', $created[0], $created[1], $created[2]); ?>"><?= sprintf('%d 年 %d 月 %d 日', $created[0], $created[1], $created[2]); ?></time></span> <span>更新: <time datetime="<?= sprintf('%d-%02d-%02d', $modified[0], $modified[1], $modified[2]); ?>"><?= sprintf('%d 年 %d 月 %d 日', $modified[0], $modified[1], $modified[2]); ?></time></span></div>
                            <span id="sharing" class="button theme" style="cursor: pointer;"><span class="icons icons-share"></span> ブログ記事を共有</span>
                            <script>
                            const shareData = {
                                title: '<?php bloginfo( 'name' ); ?>',
                                text: '<?php the_title(); ?>',
                                url: '<?php the_permalink(); ?>',
                                }

                            const btn = document.querySelector('#sharing');

                            btn.addEventListener('click', async () => {
                            try {
                                await navigator.share(shareData)
                            } catch(err) {
                            }
                            });
                            </script>
                        <div class="article-post-link">
                            <?php 
                            $next = get_next_post_link( '%link', '<span class="button theme post-nav-next"><span class="icons icons-navigate-before"></span><span>%title</span></span>');
                            $prev = get_previous_post_link( '%link', '<span class="button theme post-nav-prev"><span class="icons icons-navigate-next"></span><span>%title</span></span>');
                            ?>
                            <?php if($next): ?>
                                <?= $next ?>
                            <?php else: ?>
                                <p class="no-page"><span>これより<span class="ib">新しい投稿は</span></span><span>ありません</span></p>
                            <?php endif; ?>
                            <?php if($prev): ?>
                                <?= $prev ?>
                            <?php else: ?>
                                <p class="no-page"><span>これより<span class="ib">古い投稿は</span></span><span>ありません</span></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php endwhile; endif; ?>
                <?php endif; ?>
            </main>
            
            <?php if (is_home()): get_sidebar(); endif;?>
            <?php if (is_single()): get_sidebar('single'); endif;?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>