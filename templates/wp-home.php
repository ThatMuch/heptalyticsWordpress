<?php
/* Template Name: Custom Home Page */

/**
 * The template displaying the posts-overview
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       heptalytics_1.0.0
 * @wordpress   5.5.1
 */

?>
<?php
if (get_query_var('paged')) {
	$paged = get_query_var('paged');
} elseif (get_query_var('page')) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

$the_queryFeatured = new WP_Query(array(
	'posts_per_page' => 1,
	'order' => 'DESC',
	'orderby' => 'date',
));

// Initially load only the first 6 posts
$wp_queryPosts = new WP_Query(array(
	'posts_per_page' => 6,
	'order' => 'DESC',
	'paged' => $paged,
));
?>

<?php get_header(); ?>
<div class="container">
	<div class="text-center mb-3">
		<h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
		<p><?php echo get_post(get_option('page_for_posts'))->post_content; ?></p>
	</div>

	<?php if ($the_queryFeatured->have_posts()) : ?>
		<?php while ($the_queryFeatured->have_posts()) : $the_queryFeatured->the_post(); ?>
			<?php $categories = get_the_category(); ?>
			<div class="blog__featured">
				<?php the_post_thumbnail('large', array('class' => 'blog__image')); ?>
				<div class="blog__featured__text">
					<h2><?php the_title(); ?></h2>
					<p class="blog__date"><?php echo get_the_date(); ?></p>
					<?php the_excerpt(); ?>
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

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
	<h2 class="blog__title">Tous les articles</h2>

	<div class="blog__list">
		<?php if ($wp_queryPosts->have_posts()) : ?>
			<?php while ($wp_queryPosts->have_posts()) : $wp_queryPosts->the_post(); ?>
				<?php $categories = get_the_category(); ?>
				<?php get_template_part('templates/wp', 'post'); ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
	<?php
	the_posts_pagination()
	?>
</div> <?php get_footer(); ?>
