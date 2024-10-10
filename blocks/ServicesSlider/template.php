<?php
// The block data
$data = $args['data'];
// The block ID
$block_id = $args['block_id'];
?>

<div id="<?php echo $block_id; ?>" class="sliderServices">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="sliderServices__content">
					<h4 class="sliderServices__feature"><?php echo $data['feature'] ?></h4>
					<h2 class="sliderServices__title"><?php echo $data['title'] ?></h2>
					<div class="sliderServices__desc"><?php echo $data['text'] ?></div>
				</div>
			</div>
			<div class="col-lg-5">
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
