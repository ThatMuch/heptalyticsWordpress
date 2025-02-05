<?php
// The block data
$data = $args['data'];
// The block ID
$block_id = $args['block_id'];
?>

<div id="<?php echo $block_id; ?>" class="sliderServices">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="sliderServices__content">
					<div>
						<h2 class="sliderServices__feature mb-0 h4"><?php echo $data['feature'] ?></h2>
						<h3 class="sliderServices__title h2"><?php echo $data['title'] ?></h3>
					</div>
					<div class="sliderServices__desc"><?php echo $data['text'] ?></div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="sliderServices__list owl-carousel">
					<?php foreach ($data['sliders'] as $slider) : ?>
						<div class="sliderServices__item">
							<div class="sliderServices__icon">
								<?php echo $slider['icone']; ?>
							</div>
							<h3 class="sliderServices__item__title"><?php echo $slider['title'] ?></h3>
							<div class="sliderServices__item__desc"><?php echo $slider['text'] ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
