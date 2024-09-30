<?php
// The block data
$data = $args['data'];
// The block ID
$block_id = $args['block_id'];
?>

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
							<h4 class="pinnedSections__feature"><?php echo $layer['feature'] ?></h4>
							<h2 class="pinnedSections__title"><?php echo $layer['title'] ?></h2>
							<div class="pinnedSections__desc"><?php echo $layer['text'] ?></div>
						</div>
						<img src="<?php echo $layer["image"]["url"] ?>" alt="">
					</div>
				<?php endforeach; ?>
			</div>
		</div>






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
	</div>
</div>
