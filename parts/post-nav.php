<?php 
$next = get_next_posts_link('<span class="button theme post-nav-prev"><span class="icons icons-navigate-next"></span><span>次のページ</span></span>');
$prev = get_previous_posts_link( '<span class="button theme post-nav-next"><span class="icons icons-navigate-before"></span><span>前のページ</span></span>');
?>
<div class="article-post-link">
    <?php if($prev): ?>
        <?= $prev ?>
    <?php else: ?>
        <p class="no-page">最初のページです</p>
    <?php endif; ?>
    <?php if($next): ?>
        <?= $next ?>
    <?php else: ?>
        <p class="no-page">最後のページです</p>
    <?php endif; ?>
</div>