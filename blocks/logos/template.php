<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

$size = 'medium'; // (thumbnail, medium, large, full or custom size)
?>
<section class="section__logos">
	<div class="container">
		<?php if ($data['title']) : ?> <h2 class="title mb-5"><?php echo $data['title']; ?></h2> <?php endif; ?>
		<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> slider">
			<?php if ($data['gallery']) : ?>
				<ul class="slide-track">
					<?php foreach ($data['gallery'] as $image) : ?>
						<li class="slide">
							<?php if ($image['description']) : ?>
								<a href="<?php echo esc_url($image['description']); ?>" target="_blank">
									<img class="skip-lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</a>
							<?php else : ?>
								<img class="skip-lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
					<?php foreach ($data['gallery'] as $image) : ?>
						<li class="slide">
							<?php if ($image['description']) : ?>
								<a href="<?php echo esc_url($image['description']); ?>" target="_blank">
									<img class="skip-lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</a>
							<?php else : ?>
								<img class="skip-lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</li>
					<?php endforeach; ?>

				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
