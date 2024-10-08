<?

/**
 * Article Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       heptalytics_1.0.0
 *
 */
?>

<section>

	<article>

		<?php
		$image = get_sub_field('image')['ID'];
		if ($image) :
			echo wp_get_attachment_image($image, 'large', "", ['class' => 'modernizr-of']);
		endif;
		?>

		<div class="text">
			<h2><?php the_title(); ?></h2>
			<a class="anchor" id="<?php echo  slugify(get_sub_field('title')) ?>">&nbsp;</a>
			<?php the_sub_field('content') ?>
		</div>

	</article>

</section>
