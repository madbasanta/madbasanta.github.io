<div id="slider" class="pt-3 mt-3 pb-3">
	<div class="w-75 m-auto">
		<div class="row">
			<?php for($i = 0; $i < 10; $i++): ?>
			<div class="slides">
				<img src="/public/images/slider/slider<?= $i ?>.jpg" alt="slider image<?= $i ?>"
				class="img-fluid">
			</div>
			<?php endfor; ?>
		</div>
	</div>
</div>