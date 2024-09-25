	<?php $categories = get_the_category(); ?>
	<div class="blog__item">
		<a href="<?php the_permalink() ?>" class="blog__item__image">
			<?php the_post_thumbnail('medium'); ?>
		</a>
		<div class="blog__item__content">
			<div class="blog__item__author">
				<span><?php echo get_the_date(); ?></span>
			</div>
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
				<p><?php the_excerpt() ?></p>
			</a>
			<?php if (!empty($categories)) : ?>
				<div class="d-flex gap-2">
					<?php foreach ($categories as $category) : ?>
						<a class="badge rounded-pill bg-light text-dark" href="<?php echo site_url();  ?>/category/<?php echo $category->slug; ?>">
							<?php echo $category->name; ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
