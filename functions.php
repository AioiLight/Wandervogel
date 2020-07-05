<?php
// Sidebar
register_sidebar(array(
			'name'=>'Sidebar',
			'before_widget'=>'<aside>',
			'after_widget'=>'</aside>',
			'before_title' => '<h2 class="sidebar-title">',
			'after_title' => '</h2>'
));
?>