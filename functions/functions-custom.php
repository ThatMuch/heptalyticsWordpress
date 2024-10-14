<?php

/**
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */


/*==================================================================================
 SHORTCODES
==================================================================================*/


/* BUTTON
/––––––––––––––––––––––––*/
// Usage: [button link="https://twitter.com" text="Twitter"]
function shortcode_button($atts)
{
	$link = $atts['link'];
	$text = $atts['text'];
	return '<a href="' . $link . '" class="button">' . $text . '</a>';
}
add_shortcode('button', 'shortcode_button');

// Logo du site
add_theme_support(
	'custom-logo',
	array(
		'flex-height' => true,
	)
);

// Page d'options
if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

function find_block_by_name($block_name, $post_id)
{
	$blocks = parse_blocks(get_post_field('post_content', $post_id));

	foreach ($blocks as $block) {
		if ($block['blockName'] === $block_name) {
			return $block;
		}
	}

	return null;
}

function my_theme_customize_register($wp_customize)
{
	$wp_customize->add_setting('header_title', array(
		'default' => 'My Theme',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('header_title', array(
		'label' => __('Header Title', 'my_theme'),
		'section' => 'title_tagline',
		'settings' => 'header_title',
		'type' => 'text',
	));
	$wp_customize->add_setting('header_description', array(
		'default' => 'My Theme Description',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('header_description', array(
		'label' => __('Header Description', 'my_theme'),
		'section' => 'title_tagline',
		'settings' => 'header_description',
		'type' => 'textarea',
	));
	$wp_customize->add_setting('header_button_text', array(
		'default' => 'My Theme Button Text',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('header_button_text', array(
		'label' => __('Header Button Text', 'my_theme'),
		'section' => 'title_tagline',
		'settings' => 'header_button_text',
		'type' => 'text',
	));
	$wp_customize->add_setting('header_button_link', array(
		'default' => '#',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('header_button_link', array(
		'label' => __('Header Button Link', 'my_theme'),
		'section' => 'title_tagline',
		'settings' => 'header_button_link',
		'type' => 'text',
	));
}
add_action('customize_register', 'my_theme_customize_register');
