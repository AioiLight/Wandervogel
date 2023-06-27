<?php 
header("HTTP/1.1 404 Not Found");
get_header(); ?>
        <div class="body">
            <main class="grid-item">
                <article>
                    <h1 class="post-title">ページが見つかりません</h1>

                    <p>ページが見つかりませんでした。以下の原因が考えられます。</p>

                    <ul>
                        <li>ページが削除された。</li>
                        <li>URL が正しくない。</li>
                        <li>ブログ システムの不具合。</li>
                    </ul>

                    <p>ブラウザバックしたり、<a href="<?= home_url(); ?>">トップページ</a>に戻ったり、<a href="<?= home_url(); ?>/?s=">記事を検索</a>したりすることができます。</p>
                </article>
            </main>
                
            <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
    </body>
</html>