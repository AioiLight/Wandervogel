<?php
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

// disable image scalling
add_filter( 'big_image_size_threshold', '__return_false' );

// delete inline css
add_action("wp_enqueue_scripts", function () {
	wp_dequeue_style( 'global-styles' );
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
?>