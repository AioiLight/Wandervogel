<?php get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <?php if (is_home()): $count = 0;?>
                    <div class="index-grid header-link">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <a href="<?php the_permalink( $post ); ?>">
                            <article class="article-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php
                                    $tid = get_post_thumbnail_id();
                                    $timg = wp_get_attachment_image_src($tid, 'medium');
                                    echo $timg[0];?>"<?php if($count >= 4): ?> loading="lazy"<?php endif; ?>>
                                <?php else: ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eyecatch.png"<?php if($count >= 4): ?> loading="lazy"<?php endif; ?>>
                                <?php endif; ?>
                                <h1><?php the_title(); ?></h1>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                        </a>
                        <?php $count++; endwhile; endif; ?>
                    </div>

                    <?php get_template_part( 'parts/post-nav' ); ?>
                <?php else: ?>
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <article>
                        <h1 class="post-title"><?php the_title(); ?></h1>

                        <div class="post-date"><span>作成: <time><?php echo get_the_date(); ?></time></span> <span>更新: <time><?php the_modified_date(); ?></time></span> <span><a href="<?= the_permalink(); ?>">このページへのリンク</a></span></div>
                        
                        <?php
                            $category = get_the_category();
                            $html = '<div class="post-category">カテゴリ: ';
                            $html .= '<a href="' . get_category_link( $category[0]-> term_id ) . '" title="' . $category[0]->cat_name . '"><span class="label theme">';
                            $html .= $category[0]->cat_name . '</span></a></div>';
                            echo $html;
                        ?>
                        <?php
                            $tags = get_the_tags();
                            $html = '<div class="post-tags">タグ: ';
                            if ( $tags ) {
                                foreach ( $tags as $tag ) {
                                    $tag_link = get_tag_link( $tag->term_id );
                                            
                                    $html .= '<a href="' . $tag_link . '" title="' . $tag->name . '"><span class="label theme">';
                                    $html .= $tag->name . '</span></a>';
                                }
                            }
                            $html .= '</div>';
                            echo $html;
                        ?>

                        <?php the_content(); ?>
                    </article>
                    <?php if (is_single()) : ?>
                        <div>
                            <span id="sharing" class="button theme" style="cursor: pointer;">ブログ記事を共有</span>
                            <span id="shareresult"> 他の人にこの記事を共有</span>
                            <script>
                            const shareData = {
                                title: '<?php bloginfo( 'name' ); ?>',
                                text: '<?php the_title(); ?>',
                                url: '<?php the_permalink(); ?>',
                                }

                            const btn = document.querySelector('#sharing');
                            const resultPara = document.querySelector('#shareresult');

                            btn.addEventListener('click', async () => {
                            try {
                                await navigator.share(shareData)
                                resultPara.textContent = ' 共有ありがとうございます！'
                            } catch(err) {
                            }
                            });
                            </script>
                        <div>
                            <?php previous_post_link( '%link', '<span class="button theme">前: %title</span>'); ?>
                            <?php next_post_link( '%link', '<span class="button theme">次: %title</span>'); ?>
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