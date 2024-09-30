<?php
$data = array(
	'layers' => get_field('layers')
);
// Dynamic block ID
$block_id = 'blog' . $block['id'];

// Check if a custom ID is set in the block editor
if (!empty($block['anchor'])) {
	$block_id = $block['anchor'];
}

get_template_part(
	'blocks/Layering/template',
	null,
	array(
		'block' => $block,
		'is_preview' => $is_preview,
		'post_id' => $post_id,
		'data' => $data,
		'block_id' => $block_id,
	)
);
