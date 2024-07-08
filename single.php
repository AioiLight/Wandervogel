<?php get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <article>
                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <div class="post-info-col">
                        <div class="post-info-row">                            
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
                        <div class="post-info-row">
                        <?php 
                            $created = explode('/', get_the_date('Y/n/j'));
                            $modified = explode('/', get_the_modified_date('Y/n/j'));
                            $month_link = get_month_link($created[0], $created[1]);
                            ?>
                            <span><span class="icons icons-edit-calendar"></span> <time datetime="<?= sprintf('%d-%02d-%02d', $created[0], $created[1], $created[2]); ?>"><?= sprintf('<a href="' . $month_link . '">%d 年 %d 月</a> %d 日', $created[0], $created[1], $created[2]); ?></time> (更新: <time datetime="<?= sprintf('%d-%02d-%02d', $modified[0], $modified[1], $modified[2]); ?>"><?= sprintf('%d 年 %d 月 %d 日', $modified[0], $modified[1], $modified[2]); ?></time>)</span>
                        </div>
                    </div>

                    <?php the_content(); ?>
                </article>
                <div class="article-footer">
                    <span id="sharing" class="button theme"><span class="icons icons-share"></span> ブログ記事を共有</span>
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
                </div>
                <?php endwhile; endif; ?>
            </main>
            <?php get_sidebar('single'); ?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>