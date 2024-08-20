                <?php $img_dir = get_stylesheet_directory_uri() . '/images'; ?>
                <div class="author-info">
                    <p class="author-info__heading">この記事を書いた人</p>
                    <div class="author-info-author">
                        <img class="author-info-author__img" src="<?= $img_dir; ?>/me.webp" srcset="<?= $img_dir; ?>/me.webp 1x, <?= $img_dir; ?>/me@2x.webp 2x" width="64" height="64" loading="lazy" alt="">
                        <p class="author-info-author__name">AioiLight</p>
                    </div>
                    <div class="author-info-desc">
                        <p>Web とか Android とかをやってる人。アニメ・ゲームが好きなはずなのに消費しきれない毎日。</p>
                        <p class="author-info-desc__follow-me">Follow me!</p>
                        <p><a href="https://x.com/aioilight" target="_blank" data-gtag-click="click_author_twitter">Twitter (@aioilight)</a></p>
                    </div>
                </div>