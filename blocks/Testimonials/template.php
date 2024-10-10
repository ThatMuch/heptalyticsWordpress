<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
$args = array(
	"post_type" => "testimony",
	'orderby' => 'date',
	'order' => 'ASC',
);

$the_query = new WP_Query($args);
// get post type
$post_type = get_post_type();
$isTestimony = $post_type === 'testimony';
// the post id
$post_id = get_the_ID();
?>
<div class="container">
	<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
		<?php if ($data["metrics"]): ?>
			<div class="row mb-50">
				<div class="col-sm-3">
					<?php if ($data['title_metrics']) : ?> <h2 class="text-white metric__title"><?php echo $data['title_metrics'] ?></h2><?php endif; ?>
				</div>
				<div class="col-sm-9">
					<div class="metrics__list">
						<?php foreach ($data["metrics"] as $metric): ?>
							<div class="metric__card">
								<h3 class="metric__card__title"><?php echo $metric['metric'] ?></h3>
								<div><?php echo $metric["text"] ?></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="testimonial__list owl-carousel">
			<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<div class="testimonial__item row">
						<div class="col-sm-3">
							<div class="testimonial__img">
								<?php the_post_thumbnail('large', array('class' => 'testimonial__image')); ?>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="content">
								<h2 class="testimonial__title"><?= $data['title'] ?></h2>
								<h4 class="content__title mb-0 text-white"><?php the_title() ?></h4>
								<div class="content__desc"><?php the_content() ?></div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
</div>
