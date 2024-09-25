<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       heptalytics_1.0.0
 */
?>
<?php
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');

// get the template type of the page
$template = get_page_template_slug();
$template = str_replace(array('page-', '.php'), '', $template);
?>

<!-- If the page is not the home page display the widget from the sidebar footer-1 -->
<?php if (is_active_sidebar('footer-1')) : ?>
	<?php dynamic_sidebar('footer-1'); ?>
<?php endif; ?>

</div><!-- #content -->
<?php if (have_rows('rs', 'options') && $template !== "landing") : ?>
	<ul class="footer__rs">
		<?php while (have_rows('rs', 'options')) : the_row(); ?>
			<?php if (get_sub_field('facebook')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('facebook'); ?>" target="_blank" aria-label="Facebook">
						<i class="fab fa-facebook" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('twitter')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('twitter'); ?>" target="_blank" aria-label="Twitter">
						<i class="fab fa-twitter" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('instagram')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('instagram'); ?>" target="_blank" aria-label="Instagram">
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('google')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('google'); ?>" target="_blank" aria-label="Google">
						<i class="fab fa-google" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('linkedin')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('linkedin'); ?>" target="_blank" aria-label="Linkedin">
						<i class="fab fa-linkedin" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('youtube')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('youtube'); ?>" target="_blank" aria-label="Youtube">
						<i class="fab fa-youtube" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>

</div>
<div class="footer__area">
	<div class="row d-flex justify-content-between">
		<div class="footer__area__menu d-md-flex  justify-content-<?php echo $template !== "landing" ? "between" : "center" ?> align-items-center">
			<img class="footer__area__logo" src="<?= esc_url(get_template_directory_uri() . '/assets/images/logo-heptalytics_footer.png'); ?>" alt="Heptalytics logo">
			<?php if ($template !== "landing") : ?>
				<div class="d-md-flex align-center">
					<?php wp_nav_menu(array('theme_location' => 'submenu')); ?>
				</div>
				<div></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="footer__area__bottom d-md-flex justify-content-between">
		<div></div>
		<div>
			<?php $year = date('Y'); ?>
			<p class="text-center"> © <?php echo $year ?> Heptalytics tout droits réservés</p>
		</div>
		<a class="footer__area__credits" href="https://thatmuch.fr" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/THATMUCH_Logo_White.png" alt="logo that much">
		</a>
	</div>
</div>

<?php wp_footer() ?>
</body>

</html>
