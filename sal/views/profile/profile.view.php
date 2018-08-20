<?php require 'views/includes/head.php'; ?>

<?php require 'views/includes/error-show.view.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-5 col-sm-5 m-auto">
			<div class="mt-3 d-flex" style="position: relative;">
				<img src="<?= $user->image ? $user->image : "/public/images/no-user.jpg" ?>" class="m-auto" 
				alt="user image" style="max-width: 100%;" height="175">
				<i class="fa fa-edit show-modal image" data-id="m_modal"></i>
			</div>

			<?php include_once "include/main.edit.view.php"; ?>

		</div>
	</div>
	<div class="row clearfix mt-2">
		<div class="col-lg-4 col-md-6 m-auto d-flex">
			<div class="m-auto text-center">
				<strong style="font-size: 25px;"><?= $user->name ?></strong> <br>
				<?= $user->email ?>
			</div>
		</div>
	</div>
	<hr class="mt-1 mb-0 bg-success">
	<div class="row">
		<div class="col-md-10 col-lg-8 offset-lg-2 offset-md-1">
			<div class="row">
				<div class="col-md-6 mt-2 pr-md-1">
					<div class="card p-2 clearfix">
						<strong class="d-block">
							Personal Details 
							<i class="fa fa-edit float-right show-modal" data-id="p_modal"></i>
						</strong>
						<hr class="mt-0 mb-0 bg-dark">
						Email : <?= $user->email ?> <br>
						Date of birth : <?= $user->dob ? date_create($user->dob)->format('d, M, Y') : ""  ?> <br>
						Sex : <?= $user->gender ?>
					</div>
					
					<?php include_once "include/p-details.edit.view.php"; ?>

				</div>
				<div class="col-md-6 mt-2 pl-md-1">
					<div class="card p-2 clearfix">
						<strong class="d-block">
							Address 
							<i class="fa fa-edit float-right show-modal" data-id="a_modal"></i>
						</strong>
						<hr class="mt-0 mb-0 bg-dark">
						<?= $user->street_add . ", " . $user->postbox_no ?> <br>
						<?= $user->locality . ", " . $user->region . ", " . $user->postal_code ?> <br>
						<?= $user->country ?>
					</div>

					<?php include_once "include/address.edit.view.php"; ?>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
			<div class="mt-2 card p-2 text-center">
				<h4>Membership Information</h4>
				<hr class="mt-0 mb-1 bg-dark">
				Addoption Start Date <br>
				<?= $user->adp_start_date ? date_create($user->adp_start_date)->format('d, M, Y') : "" ?>
				<br> <br>
				Addoptin End Date <br>
				<?= $user->adp_start_date ? date_create($user->adp_end_date)->format('d, M, Y') : "" ?>
				<br> <br>
				Remaining Membership Days <br>
				<?= $remaining ?>
				<br> <br>
				<span class="text-success font-weight-bold">Donation Made</span>
				<span class="text-success font-weight-bold">$ <?= $fee ?> </span>
			</div>
		</div>
	</div>
</div>

<?php require 'views/includes/footer.php'; ?>

</body>
</html>