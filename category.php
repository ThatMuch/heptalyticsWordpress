<?php
$term = get_queried_object();
$category_description = category_description(get_category_by_slug($term->slug));
$args = array(
	'posts_per_page' => 4,
	'category_name' => $term->slug
);

$the_query = new WP_Query($args);
$exclude_posts = 4; // Number of posts to exclude
$total_posts = wp_count_posts()->publish; // Total number of published posts
$argsAll = array(
	'post_type' => 'post',
	'posts_per_page' => $total_posts - $exclude_posts,
	'category_name' => $term->slug,
	'offset' => 1
);
$queryAll = new WP_Query($argsAll);

// query to select just the first post
$argsFirst = array(
	'posts_per_page' => 1,
	'category_name' => $term->slug
);
$queryFirst = new WP_Query($argsFirst);


?>
<?php get_header(); ?>
<div class="container content-area page__area blog">
	<main id="blog">
		<div class="container">
			<div class="row g-3">
				<div class="col-lg-5">
					<div class="blog__left">
						<div class="blog__box
						<?php echo
						$term->slug === "professionnel" ?
							'dark' : ($term->slug === "temoignage" ? 'orange' : ''); ?>">
							<h1 class="h2 text-white"><?php single_cat_title(); ?></h1>
							<?php
							echo $category_description;
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<?php if ($queryFirst->have_posts()) : ?>
						<?php while ($queryFirst->have_posts()) : $queryFirst->the_post(); ?>
							<?php get_template_part('templates/wp', 'post'); ?>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<?php if ($queryAll->have_posts()) : ?>
					<?php while ($queryAll->have_posts()) : $queryAll->the_post(); ?>
						<div class="col-md-4">
							<?php get_template_part('templates/wp', 'post'); ?>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>
