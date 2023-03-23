<?php
/**
 * My First Block
 */

// $data is what we're going to expose to our render template
$data = array(
	'title' => get_field( 'title' ),
	'text' => get_field( 'text' ),
	'icon' => get_field( 'icon' ),
	'file' => get_field( 'file' ),
);

// Dynamic block ID
$block_id = 'article__box-' . $block['id'];

// Check if a custom ID is set in the block editor
if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
}

// Block classes
$class_name = 'article__box';
if( !empty($block['class_name']) ) {
    $class_name .= ' ' . $block['class_name'];
}

/**
 * Pass the block data into the template part
 */
get_template_part(
	'blocks/widgetSidebar/template',
	null,
	array(
		'block'      => $block,
		'is_preview' => $is_preview,
		'post_id'    => $post_id,

		'data'       => $data,
        'class_name' => $class_name,
        'block_id'   => $block_id,
	)
);
