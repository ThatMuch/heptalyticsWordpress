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

</div>
<div class="footer__area">
	<div class="footer__area__menu d-md-flex  justify-content-<?php echo $template !== "landing" ? "between" : "center" ?> align-items-center">
		<div class="col-sm-3">
			<img class="footer__area__logo" data-src="<?php if ($image[0]) : echo $image[0];
														else : echo get_template_directory_uri() ?>/assets/images/stanlee_logo_texte.png<? endif; ?>" alt="Heptalytics">
			<p><?php echo get_theme_mod('header_title', 'Le meilleur outil pour analyser vos données') ?></p>
		</div>
		<div class="col-sm-4">
			<?php wp_nav_menu(array('theme_location' => 'submenu')); ?>
		</div>
		<div class="col-sm-2">
			<?php if (have_rows('rs', 'options') && $template !== "landing") : ?>
				<ul class="footer__rs">
					<?php while (have_rows('rs', 'options')) : the_row(); ?>
						<?php if (get_sub_field('facebook')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('facebook'); ?>" target="_blank" aria-label="Facebook">
									<i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('twitter')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('twitter'); ?>" target="_blank" aria-label="Twitter">
									<i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('instagram')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('instagram'); ?>" target="_blank" aria-label="Instagram">
									<i class="fa-brands fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('google')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('google'); ?>" target="_blank" aria-label="Google">
									<i class="fa-brands fa-google" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('linkedin')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('linkedin'); ?>" target="_blank" aria-label="Linkedin">
									<i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('youtube')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('youtube'); ?>" target="_blank" aria-label="Youtube">
									<i class="fa-brands fa-youtube" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<!-- <div class="footer__area__bottom d-md-flex justify-content-between">
		<div></div>
		<div>
			<?php // $year = date('Y');
			?>
			<p class="text-center"> © <?php echo $year ?> Heptalytics tous droits réservés</p>
		</div>
		<a class="footer__area__credits" href="https://thatmuch.fr" target="_blank" rel="noopener noreferrer">
			<img src="<?php // echo get_template_directory_uri()
						?>/assets/images/THATMUCH_Logo_White.png" alt="logo that much">
		</a>
	</div> -->
</div>
<script>
	// if browser is Safari
	if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
		document.addEventListener("DOMContentLoaded", function() {
			gsap.delayedCall(5, () => ScrollTrigger.refresh());
			console.log("test");
		});
	} else {
		ScrollTrigger.refresh();
	}
</script>

<?php if (is_front_page()) : ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
		integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/Observer.min.js"
		integrity="sha512-pLJlXRr/H5t+k+Tjc+Qe0Z6u6psPak7rvYBdsZ0Z+kG84jn/zifMNTQBZKZlwZC1z23bifGoQWzGnI0eWBJKPQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
		integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollToPlugin.min.js"
		integrity="sha512-1PKqXBz2ju2JcAerHKL0ldg0PT/1vr3LghYAtc59+9xy8e19QEtaNUyt1gprouyWnpOPqNJjL4gXMRMEpHYyLQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php endif; ?>
<?php wp_footer() ?>
</body>

</html>
