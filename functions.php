<?php
// Sidebar
register_sidebar(array(
			'name'=>'Sidebar',
			'id' => 'sidebar-1',
			'before_widget'=>'<aside>',
			'after_widget'=>'</aside>',
			'before_title' => '<h2 class="sidebar-title">',
			'after_title' => '</h2>'
));

// eyecatch
add_theme_support( 'post-thumbnails' );

// disable image scalling
add_filter( 'big_image_size_threshold', '__return_false' );
?>