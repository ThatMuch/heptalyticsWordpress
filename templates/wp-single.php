<?

/**
 * The template for displaying all single posts and attachments
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       heptalytics_1.0.0
 */

// Get the post's categories
$categories = get_the_category();
$wp_queryRelated = new WP_Query(array(
	'posts_per_page' => 3,
	'order' => 'DESC',
	'paged' => $paged,
	'post__not_in' => array(get_the_ID()),
));
?>

<?php get_header(); ?>

<div class="page__area">
	<div class="container">
		<div class="blog__featured">
			<?php the_post_thumbnail('large', array('class' => 'blog__image')); ?>
			<div class="blog__featured__text">
				<h1><?php the_title(); ?></h1>
				<p class="blog__date"><?php echo get_the_date(); ?></p>

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
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="article__text">
					<?php the_content(); ?>
				</div>
		<?php endwhile;
			wp_reset_postdata();
		endif; ?>

		<?php if ($wp_queryRelated->have_posts()) : ?>
			<h2>Related Posts</h2>
			<div class="blog__list">
				<?php while ($wp_queryRelated->have_posts()) : $wp_queryRelated->the_post(); ?>
					<?php $categories = get_the_category(); ?>
					<?php get_template_part('templates/wp', 'post'); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
	</div>
	<?php get_footer(); ?>
