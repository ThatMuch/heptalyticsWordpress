<?php
// The block data
$data = $args['data'];
// The block ID
$block_id = $args['block_id'];
?>

<div id="<?php echo $block_id; ?>" class="statsSlider">
	<div class="container">
		<div class="statsSlider__content">
			<h4 class="statsSlider__feature"><?php echo $data['feature'] ?></h4>
			<h2 class="statsSlider__title"><?php echo $data['title'] ?></h2>
		</div>
		<div class="statsSlider__list owl-carousel">
			<?php $i = 0; ?>
			<?php foreach ($data['cards'] as $card) : ?>
				<div class="statsSlider__item <?php echo $i === 0 ? "featured" : "" ?>">
					<h3 class="statsSlider__item__title"><?php echo $card['stats'] ?></h3>
					<?php if ($card["image"]) : ?>
						<img class="statsSlider__item__icon" src="<?php echo $card["image"]["url"]
																	?>" alt="<?php echo $card["image"]["alt"]
																			?>">
					<?php endif; ?>
					<div class="statsSlider__item__desc"><?php echo $card['text'] ?></div>
				</div>
			<?php $i++;
			endforeach; ?>
		</div>
	</div>
</div>
