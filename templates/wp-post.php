	<?php $categories = get_the_category(); ?>
	<div class="blog__item">
		<?php
		$title_id = 'blog-title-' . get_the_ID(); // Unique ID for the title
		$excerpt_id = 'blog-excerpt-' . get_the_ID(); // Unique ID for the excerpt
		$has_excerpt = has_excerpt();
		?>
		<a href="<?php the_permalink() ?>" class="blog__item__image"
			aria-label="<?php the_title_attribute(); ?>" aria-labelledby="<?php echo $title_id; ?>"
			<?php if ($has_excerpt) : ?>aria-describedby="<?php echo $excerpt_id; ?>" <?php endif; ?>
			title="<?php the_title_attribute(); ?>"> <?php the_post_thumbnail('medium'); ?>
			<?php the_post_thumbnail('medium'); ?>
		</a>
		<div class="blog__item__content">
			<?php if (!empty($categories)) : ?>
				<div class="d-flex gap-2 mb-4">
					<?php foreach ($categories as $category) : ?>
						<?php if ($category->slug !== 'uncategorized') : ?>
							<a class="badge badge-light" href="<?php echo site_url();  ?>/category/<?php echo $category->slug; ?>">
								<?php echo $category->name; ?>
							</a>
						<?php endif; ?>

					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<a href="<?php the_permalink() ?>">
				<h3><?php the_title(); ?></h3>
			</a>

		</div>
	</div>
