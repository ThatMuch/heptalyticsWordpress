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
		endif; ?>
	</div>
</div>
<?php get_footer(); ?>
