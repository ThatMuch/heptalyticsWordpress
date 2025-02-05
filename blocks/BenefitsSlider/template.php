<?php
// The block data
$data = $args['data'];
// The block ID
$block_id = $args['block_id'];
?>

<div id="<?php echo $block_id; ?>" class="sliderBenefits">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="sliderBenefits__content">
					<img src="<?php echo $data["image"]["url"] ?>" alt="<?php echo $data['title'] ?>">
					<h2 class="sliderBenefits__title text-center h3"><?php echo $data['title'] ?></h2>
				</div>
			</div>
			<div class="col-lg-6">
				<h3 class="sliderBenefits__feature h4"><?php echo $data['feature'] ?></h3>
				<div class="sliderBenefits__list owl-carousel">
					<?php foreach ($data['sliders'] as $slider) : ?>
						<div class="sliderBenefits__item">
							<h3 class="sliderBenefits__item__title"><?php echo $slider['title'] ?></h3>
							<div class="sliderBenefits__item__desc"><?php echo $slider['text'] ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
