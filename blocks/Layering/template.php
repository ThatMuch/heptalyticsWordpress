<?php
// The block data
$data = $args['data'];
// The block ID
$block_id = $args['block_id'];
?>
<div id="features"></div>
<div id="<?php echo $block_id; ?>">
	<div class="container">
		<div class="pinnedSections__wrapper">
			<div class="pinnedSections">
				<?php
				$index = 0;
				foreach ($data['layers'] as $layer) :
					$index++;
				?>
					<div class="pinnedSections__item" id="card<?php echo $index ?>">
						<div>
							<h2 class="pinnedSections__feature h4"><?php echo $layer['feature'] ?></h2>
							<h3 class="pinnedSections__title h2"><?php echo $layer['title'] ?></h3>
							<div class="pinnedSections__desc"><?php echo $layer['text'] ?></div>
						</div>
						<img src="<?php echo $layer["image"]["url"] ?>" alt="">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
