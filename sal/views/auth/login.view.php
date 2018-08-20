<?php require('views/includes/head.php'); ?>

<section id="login">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h4>Log In</h4>
			</div>
			<div class="card-text p-3">
				<form action="/login" method="POST" id="login-form">
					<div class="row">
						<div class="col-sm-4">
							<div class="text-right"><label for="email">Email</label></div>
						</div>
						<div class="col-sm-7">
							<div>
								<input type="email" name="email" id="email" class="form-control" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="text-right"><label for="password">Password</label></div>
						</div>
						<div class="col-sm-7">
							<div>
								<input type="password" name="password" id="password" class="form-control" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 px-sm-5">
							<div class="text-center">
								<button class="btn btn-primary px-5" type="submit">Log In</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php require('views/includes/footer.php'); ?>
</body>
</html>