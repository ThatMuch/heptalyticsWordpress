<?php
$data = array(
	'feature' => get_field('feature'),
	'title' => get_field('title'),
	'text' => get_field('text'),
	'sliders' => get_field('sliders'),
);
// Dynamic block ID
$block_id = 'blog' . $block['id'];

// Check if a custom ID is set in the block editor
if (!empty($block['anchor'])) {
	$block_id = $block['anchor'];
}

get_template_part(
	'blocks/ServicesSlider/template',
	null,
	array(
		'block' => $block,
		'is_preview' => $is_preview,
		'post_id' => $post_id,
		'data' => $data,
		'block_id' => $block_id,
	)
);
