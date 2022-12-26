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

// delete jQuery
add_action('init', function() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
	}
});

// delete inline css
add_action("wp_enqueue_scripts", function () {
	wp_dequeue_style( 'global-styles' );
});
?>