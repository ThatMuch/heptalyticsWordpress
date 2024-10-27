<?php

/**
 * Register Block Types
 *
 * @package WordPress
 * @subpackage heptalytics
 * @since heptalytics 1.0.0
 */

$icon = '<svg width="89" height="84" viewBox="0 0 89 84" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M67.3906 32.9305C67.3906 46.2701 60.3947 58.5963 48.9264 65.8553C58.1852 69.9774 68.6583 70.262 78.0355 66.8004L88.9174 53.6886L80.1444 16.7441L55.8512 5.49969C63.1552 12.7303 67.3965 22.4888 67.3965 32.9305H67.3906Z" fill="#3C98ED"/>
<path d="M64.6423 72.6134C57.8005 72.6134 50.9408 70.9566 44.6972 67.626C32.5121 61.1128 24.6869 49.1623 23.7154 35.9252C14.427 41.9545 8.49144 51.5934 7.42517 62.2571L24.9001 83.317H64.3284L74.0966 71.543C70.9866 72.2547 67.8175 72.6191 64.6364 72.6191L64.6423 72.6134Z" fill="#3C98ED"/>
<path opacity="0.38" d="M27.181 33.9268C27.4594 46.2929 34.2895 57.6341 45.2958 64.005C56.2191 57.8504 63.1498 46.8508 63.7837 34.7353C52.5464 28.3587 38.6967 28.0512 27.181 33.9211V33.9268Z" fill="#70BABB"/>
<path d="M24.6097 31.3818C36.7889 24.7946 51.5153 24.6523 63.7714 30.8239C63.0132 18.1789 55.4486 6.87179 43.6426 0.967745L43.7967 0.683075L9.09553 16.7441L0.32251 53.6885L4.38026 58.5792C6.54834 47.2038 13.8286 37.2062 24.6038 31.3818H24.6097Z" fill="#3C98ED"/>
<path d="M27.181 33.9268C27.4594 46.2928 34.2895 57.6341 45.2958 64.005C56.2191 57.8504 63.1498 46.8508 63.7837 34.7352C52.5464 28.3586 38.6967 28.0512 27.181 33.9211V33.9268Z" fill="#FF7253"/>
</svg>';

register_block_type(
	get_template_directory() . '/blocks/Testimonials/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/logos/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/link/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/Blog/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/Faq/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/Layering/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/ServicesSlider/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/BenefitsSlider/block.json',
	array(
		'icon'  => $icon,
	),
);
register_block_type(
	get_template_directory() . '/blocks/StatsSlider/block.json',
	array(
		'icon'  => $icon,
	),
);
