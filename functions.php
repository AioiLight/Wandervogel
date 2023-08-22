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

	wp_enqueue_style( 'wandervogel-common', get_stylesheet_directory_uri() . '/css/common.css', array(), '20230823');

	if (is_archive() || is_home() || is_search()) {
		wp_enqueue_style( 'wandervogel-archive', get_stylesheet_directory_uri() . '/css/archive.css', array(), '20230823');
	}

	if (is_singular()) {
		wp_enqueue_style( 'wandervogel-singular', get_stylesheet_directory_uri() . '/css/singular.css', array(), '20230823');
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
?>