<?php
$title = get_field('title') ?: 'Default title';
$text = get_field('text') ?: 'Default text';
$link = get_field('link');
$image = get_field('background');
?>
<div class="container">
	<section class="block__link">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<img src="<?php echo $image["url"] ?>" alt="<?php echo get_the_title(); ?>">
				</div>
				<div class="col-lg-6">
					<h3 class="block__link__title"><?php echo $title; ?></h3>
					<p><?php echo $text; ?></p>
					<?php if ($link) : ?>
						<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="btn btn__white">
							<?php echo esc_html($link['title']); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>
