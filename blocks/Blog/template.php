<?php
$argsQuery = array(
	'posts_per_page' => 3,
	'order' => 'DESC',

);

$the_query = new WP_Query($argsQuery);

$data = $args['data'];
?>
<section class="block__blog">
	<div class="container">
		<?php if ($the_query->have_posts()) : ?>
			<div class="d-inline-flex gap-2 align-items-center mb-4">
				<h2 class="mb-0"><?php echo $data['title']
									?></h2>
				<a href="<?php

							echo get_permalink(get_option('page_for_posts'));
							?>" class="btn btn__light d-block">See all the news</a>
			</div>
			<div class="blog__list">
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<?php get_template_part('templates/wp', 'post'); ?>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>
