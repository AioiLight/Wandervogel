<?php
// remove emoji styles
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
// Sidebar
register_sidebar(array(
	'name'=>'Archive Sidebar',
	'id' => 'archive-sidebar',
	'before_widget'=>'<aside>',
	'after_widget'=>'</aside>',
	'before_title' => '<h2 class="sidebar-title">',
	'after_title' => '</h2>'
));
register_sidebar(array(
	'name'=>'Article Sidebar',
	'id' => 'article-sidebar',
	'before_widget'=>'<aside>',
	'after_widget'=>'</aside>',
	'before_title' => '<h2 class="sidebar-title">',
	'after_title' => '</h2>'
));

// eyecatch
add_theme_support( 'post-thumbnails' );

// html5 support
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

// disable image scalling
add_filter( 'big_image_size_threshold', '__return_false' );

// delete inline css
add_action("wp_enqueue_scripts", function () {
	wp_dequeue_style( 'global-styles' );

	wp_enqueue_style( 'wandervogel-common', get_stylesheet_directory_uri() . '/css/common.min.css', array(), '20240820');

	if (is_archive() || is_home() || is_search()) {
		wp_enqueue_style( 'wandervogel-archive', get_stylesheet_directory_uri() . '/css/archive.min.css', array(), '20240722');
	}

	if (is_singular()) {
		wp_enqueue_style( 'wandervogel-singular', get_stylesheet_directory_uri() . '/css/singular.min.css', array(), '20250731');

		wp_enqueue_script( 'wandervogel-singular', get_stylesheet_directory_uri() . '/js/singular.min.js', array(), '20240820', array( 'strategy' => 'defer', 'in_footer' => false));
	}
});

// get the description
function get_pages_description() {
	if (is_home()) {
		return 'AioiLight が運営するブログ。パソコン・スマホに関する雑記やレビューをメインに掲載。';
	} else if (is_singular(array('post', 'page'))) {
		$desc = get_field('meta_desc');
		if (!empty($desc)) {
			return $desc;
		}
		return get_the_excerpt();
	} else if (is_category()) {
		$cat = single_cat_title('', false);
		return 'AioiLight が運営するブログ「Wangel」の、' . $cat . 'に属する記事をリストアップしているページ。';
	} else if (is_tag()) {
		$tag = single_tag_title('', false);
		return 'AioiLight が運営するブログ「Wangel」の、' . $tag . 'に関する記事をリストアップしているページ。';
	}
	return null;
}

// css for Gutenberg
add_action( 'after_setup_theme', function(){
	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
});

// affiliate shortcode
add_shortcode( 'af_3ec', 'af_3ec' );
// affiliate shortcode
function af_3ec( $atts ) {
	$attrs = shortcode_atts(
		array(
			'image' => null,
			'title' => 'タイトルなし',
			'amazon' => '',
			'rakuten' => '',
			'yahoo' => '',
		),
		$atts
	);
	$image = isset($attrs['image']) ? wp_get_attachment_image( $attrs['image'], 'thumbnail' ) : null;
	ob_start();
	?>
<aside class="affiliate-3ec <?php if ($image): ?>affiliate-3ec--has-image<?php endif; ?>">
	<?php if ($image): ?>
		<a href="<?= esc_url($attrs['amazon']); ?>" target="_blank" class="affiliate-3ec__image">
			<?= $image; ?>
		</a>
	<?php endif; ?>
	<div class="affiliate-3ec__content">
		<p class="affiliate-3ec__title">
			<?= esc_html($attrs['title']); ?>
		</p>
		<p class="affiliate-3ec__description">各ショッピングサイトの<span class="ib">商品ページ:</span></p>
	</div>
	<div class="affiliate-3ec__links">
		<?php if (!empty($attrs['amazon'])): ?>
			<a href="<?= esc_url($attrs['amazon']); ?>" target="_blank" class="affiliate-3ec__link affiliate-3ec__link--amazon" rel="nofollow">Amazon.co.jp</a>
		<?php endif; ?>
		<?php if (!empty($attrs['rakuten'])): ?>
			<a href="<?= esc_url($attrs['rakuten']); ?>" target="_blank" class="affiliate-3ec__link affiliate-3ec__link--rakuten" rel="nofollow">楽天市場</a>
		<?php endif; ?>
		<?php if (!empty($attrs['yahoo'])): ?>
			<a href="<?= esc_url($attrs['yahoo']); ?>" target="_blank" class="affiliate-3ec__link affiliate-3ec__link--yahoo" rel="nofollow">Yahoo! ショッピング</a>
		<?php endif; ?>
	</div>
</aside>
	<?php
	return ob_get_clean();
}
?>