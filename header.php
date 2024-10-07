<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       heptalytics_1.0.0
 */

// get the template type of the page
$template = get_page_template_slug();
$template = str_replace(array('page-', '.php'), '', $template);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=5, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php heptalytics_gtm('head') ?>
	<!--=== OPEN-GRAPH TAGS ===-->
	<?php heptalytics_ogtags() ?>
	<!--=== PRELOAD FONTS ===-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/normalize.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<!-- Google Tag Manager -->
	<!-- End Google Tag Manager -->
	<!--=== WP HEAD ===-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<!-- End Google Tag Manager (noscript) -->
	<?php heptalytics_gtm('body') ?>

	<?php
	$custom_logo_id = get_theme_mod('custom_logo');
	$image = wp_get_attachment_image_src($custom_logo_id, 'full');
	?>

	<nav class="header__area navbar sticky-top navbar-expand-lg">
		<div class="container align-items-center <?= $template === "landing" ? "justify-content-center" : "" ?>">
			<a class="navbar-brand" href="<?php echo site_url(); ?>">
				<img data-src="<?php if ($image[0]) : echo $image[0];
								else : echo get_template_directory_uri() ?>/assets/images/stanlee_logo_texte.png<? endif; ?>" alt="Heptalytics">
			</a>
			<?php if ($template !== "landing") : ?>
				<div class="collapse navbar-collapse" id="navbar">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'mainmenu', // Defined when registering the menu
						'menu_id'        => 'menu-main',
						'container'      => false,
						'depth'          => 3,
						'menu_class'     => 'nav navbar-nav mx-auto',
						'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
						'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
					));
					?>
				</div>
				<div id="right-menu" class="right-menu">
					<a href="<?php echo get_theme_mod('header_button_link', '#') ?>" class="btn btn__primary">
						<?php echo get_theme_mod('header_button_text', 'Demander une démo') ?>
					</a>
					<input type="checkbox">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</nav>

	<?php if (is_front_page()) : ?>
		<header class="header--frontpage">
			<div class="header__container">
				<h1 class="header__title">
					<?php echo get_theme_mod('header_title', 'Le meilleur outil pour analyser vos données') ?>
				</h1>
				<p class="header__description">
					<?php echo get_theme_mod('header_description', 'Heptalytics est un outil d\'analyse de données qui vous permet de suivre et d\'analyser vos données en temps réel.') ?>
				</p>
				<a href="<?php echo get_theme_mod('header_button_link', '#') ?>" class="btn btn__white">
					<?php echo get_theme_mod('header_button_text', 'Demander une démo') ?>
				</a>
			</div>
			<svg clip-rule="evenodd" fill-rule="evenodd" stroke-miterlimit="10" viewBox="0 0 1687.82 334.83" width="100%"
				xmlns="http://www.w3.org/2000/svg">
				<g id="groupa" fill="transparent" stroke="#4C4C79" stroke-width="1" transform="translate(293.43 -3584.87)">
					<polygon id="placeholdera" fill="none" points="0,0 1687.82,0 1687.82,334.83 0,334.83"></polygon>
					<path class="path--0" d="m-293.26 3705.77c150.31-20.85 278.26-28.77 417.89-12.16 179.67 22.21 334.18 74.19 512.93 97.85 300.77 41.84 524.43-67.86 756.69-206.37">
						<animate class="path--0_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3798.79c150.31 20.85 278.26 28.73 417.89 12.21 179.67-22.21 334.18-74.2 512.93-97.85 300.77-41.84 524.43 67.86 756.69 206.37" begin="groupa.mouseenter+0s;groupa.mousedown+0s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--0_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3705.77c150.31-20.85 278.26-28.77 417.89-12.16 179.67 22.21 334.18 74.19 512.93 97.85 300.77 41.84 524.43-67.86 756.69-206.37" begin="groupa.mouseleave+0s;groupa.mouseup+0s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--1" d="m-293.26 3728.08c261.5-61 449-60 703.69 1.84 180 40.77 371.4 99.12 560.2 61.06 151.21-30.05 291.72-110.34 423.62-182.81">
						<animate class="path--1_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3776.48c261.5 61 449 60 703.69-1.84 180-40.77 371.4-99.12 560.2-61.06 151.21 30.05 291.72 110.34 423.62 182.81" begin="groupa.mouseenter+0.1s;groupa.mousedown+0.1s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--1_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3728.08c261.5-61 449-60 703.69 1.84 180 40.77 371.4 99.12 560.2 61.06 151.21-30.05 291.72-110.34 423.62-182.81" begin="groupa.mouseleave+0.1s;groupa.mouseup+0.1s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--2" d="m-293.26 3751.69c257.6-82.61 466.17-100.05 726.6-35.21 182.08 39.29 370.6 119 564.76 83.11 141.9-29.59 270.27-103.33 396.15-169.59">
						<animate class="path--2_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3752.87c257.6 82.61 466.17 100.05 726.6 35.21 182.08-39.29 370.6-119 564.77-83.11 141.92 29.55 270.26 103.33 396.14 169.59" begin="groupa.mouseenter+0.2s;groupa.mousedown+0.2s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--2_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3751.69c257.6-82.61 466.17-100.05 726.6-35.21 182.08 39.29 370.6 119 564.76 83.11 141.9-29.59 270.27-103.33 396.15-169.59" begin="groupa.mouseleave+0.2s;groupa.mouseup+0.2s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--3" d="m-293.26 3776.64c255.76-103.88 477.89-142.19 749.5-73.6 181 37.31 376.4 139.53 569.34 105.15 65.28-12.91 126-37.91 184.63-64.82 62.7-29 123.61-60.79 184-92.5">
						<animate class="path--3_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3727.92c255.76 103.88 477.89 142.19 749.51 73.6 181-37.31 376.4-139.53 569.33-105.15 65.28 12.91 126 37.91 184.63 64.82 62.7 29 123.61 60.79 184 92.5" begin="groupa.mouseenter+0.3s;groupa.mousedown+0.3s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--3_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3776.64c255.76-103.88 477.89-142.19 749.5-73.6 181 37.31 376.4 139.53 569.34 105.15 65.28-12.91 126-37.91 184.63-64.82 62.7-29 123.61-60.79 184-92.5" begin="groupa.mouseleave+0.3s;groupa.mouseup+0.3s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--4" d="m-293.26 3802.78c390.7-191.59 626.83-181 1032.45-32.67 98 32.39 210.95 68.7 313.86 46.68 60.85-11.9 118.36-36.2 171.7-61 57.27-26.75 113.5-55.71 169.5-84.66">
						<animate class="path--4_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3701.78c390.7 191.59 626.83 180.95 1032.45 32.67 98-32.39 210.95-68.7 313.86-46.68 60.85 11.9 118.36 36.2 171.7 61 57.28 26.75 113.5 55.71 169.5 84.66" begin="groupa.mouseenter+0.4s;groupa.mousedown+0.4s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--4_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3802.78c390.7-191.59 626.83-181 1032.45-32.67 98 32.39 210.95 68.7 313.86 46.68 60.85-11.9 118.36-36.2 171.7-61 57.27-26.75 113.5-55.71 169.5-84.66" begin="groupa.mouseleave+0.4s;groupa.mouseup+0.4s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--5" d="m-293.26 3830.11c252.62-144.56 497.41-231.11 795.32-153.94 137.44 30.83 278.61 103.51 419.08 141.83 119.1 35.65 231.62-6 334.36-57.18 46.61-22.51 92.63-46.07 138.75-69.77">
						<animate class="path--5_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3674.45c252.62 144.55 497.41 231.07 795.32 153.94 137.45-30.84 278.61-103.51 419.08-141.85 119.11-35.65 231.62 6 334.36 57.18 46.61 22.51 92.64 46.07 138.75 69.77" begin="groupa.mouseenter+0.5s;groupa.mousedown+0.5s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--5_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3830.11c252.62-144.56 497.41-231.11 795.32-153.94 137.44 30.83 278.61 103.51 419.08 141.83 119.1 35.65 231.62-6 334.36-57.18 46.61-22.51 92.63-46.07 138.75-69.77" begin="groupa.mouseleave+0.5s;groupa.mouseup+0.5s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--6" d="m-293.26 3858.61c145.31-91.76 316.14-192.61 499.26-214.68 203.36-30.69 396.83 29.68 584.05 115.5 93.35 40 204 98.16 318 74.57 71.54-14.09 134.47-46.24 195.31-76.67 30.4-15.28 60.52-30.68 90.94-46.33">
						<animate class="path--6_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3646c145.31 91.71 316.14 192.6 499.26 214.63 203.32 30.69 396.79-29.63 584-115.5 93.35-40 204-98.16 318-74.57 71.55 14.08 134.47 46.24 195.31 76.67 30.41 15.28 60.52 30.68 90.94 46.33" begin="groupa.mouseenter+0.6s;groupa.mousedown+0.6s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--6_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3858.61c145.31-91.76 316.14-192.61 499.26-214.68 203.36-30.69 396.83 29.68 584.05 115.5 93.35 40 204 98.16 318 74.57 71.54-14.09 134.47-46.24 195.31-76.67 30.4-15.28 60.52-30.68 90.94-46.33" begin="groupa.mouseleave+0.6s;groupa.mouseup+0.6s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--7" d="m-293.26 3888.4c143.31-102.32 321-222.42 512.77-252.75 207.37-38.89 407.85 21.76 595.91 118.45 91.62 44.31 203.08 112.81 320.05 88.5 97.31-20.1 174.24-69.73 258.78-111.6">
						<animate class="path--7_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3616.16c143.31 102.32 321 222.42 512.77 252.75 207.37 38.89 407.85-21.76 595.91-118.45 91.62-44.31 203.08-112.81 320.05-88.5 97.31 20.1 174.24 69.73 258.78 111.6" begin="groupa.mouseenter+0.7s;groupa.mousedown+0.7s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--7_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3888.4c143.31-102.32 321-222.42 512.77-252.75 207.37-38.89 407.85 21.76 595.91 118.45 91.62 44.31 203.08 112.81 320.05 88.5 97.31-20.1 174.24-69.73 258.78-111.6" begin="groupa.mouseleave+0.7s;groupa.mouseup+0.7s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
					<path class="path--8" d="m-293.26 3919.47c8.11-6.29 16.41-12.76 24.45-19 137.81-111.22 329.15-246.92 526.81-277.97 235.63-41.41 433 39.84 608.62 140.74 77.43 43.56 189.74 112.18 296.37 88 75.61-14.78 141-52.24 202.43-84.57q14.55-8.11 28.88-15.93">
						<animate class="path--8_0 animation--0" fill="freeze" attributeName="d" to="m-293.26 3585.09c8.11 6.29 16.41 12.76 24.45 19 137.81 111.22 329.15 246.91 526.81 277.97 235.63 41.41 433-39.84 608.62-140.74 77.43-43.56 189.74-112.18 296.37-88 75.61 14.78 141 52.24 202.44 84.57q14.53 8.11 28.87 15.93" begin="groupa.mouseenter+0.8s;groupa.mousedown+0.8s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
						<animate class="path--8_1 animation--1" fill="freeze" attributeName="d" to="m-293.26 3919.47c8.11-6.29 16.41-12.76 24.45-19 137.81-111.22 329.15-246.92 526.81-277.97 235.63-41.41 433 39.84 608.62 140.74 77.43 43.56 189.74 112.18 296.37 88 75.61-14.78 141-52.24 202.43-84.57q14.55-8.11 28.88-15.93" begin="groupa.mouseleave+0.8s;groupa.mouseup+0.8s" dur="500ms" repeatCount="1" calcMode="spline" keyTimes="0;1" keySplines="0.38 0 0.61 1"></animate>
					</path>
				</g>
			</svg>
		</header>
	<?php endif; ?>

	<?php if (is_home()) : ?>
		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
	<?php endif; ?>
	<?php if (is_archive() || is_category()) : ?>
		<header>
			<h1 class="page-title screen-reader-text">
				<?php
				if (is_day()) :
					echo get_the_date();
				elseif (is_month()) :
					echo get_the_date(_x('F Y', 'monthly archives date format', 'stanlee'));
				elseif (is_year()) :
					echo get_the_date(_x('Y', 'yearly archives date format', 'stanlee'));
				else :
					single_cat_title();
				endif;
				?>
			</h1>
		</header>
	<?php endif; ?>
	<div id="content" class="section__area">
