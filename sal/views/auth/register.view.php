<?php require('views/includes/head.php'); ?>

<section id="register">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h4>Register</h4>
			</div>
			<div class="card-text p-3">
				<form action="/register" method="POST" id="register-form">
					<div class="row">
						
						<?php require_once "views/auth/include/p-details.view.php"; ?>

						<div class="col-md-6" style="border-left: 1px solid #ccc;">
							
							<?php require_once "views/auth/include/addoption.view.php"; ?>

							<?php require_once "views/auth/include/address.view.php"; ?>

						</div>
					</div>
					<div class="text-center mt-2">
						<button type="submit" class="btn btn-primary px-5">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php require('views/includes/footer.php'); ?>
<script>
	$(document).on('change', 'input[name="addopted"]', function (event) {
		let sd = $('[name="adp_start_date"]');
		let ed = $('[name="adp_end_date"]');
		if(sd.attr('readonly') && $('input[name="addopted"]:checked').val() == 'on'){
			sd.removeAttr('readonly');
			ed.removeAttr('readonly');
		}else{
			sd.attr('readonly',"readonly");
			ed.attr('readonly',"readonly");
		}

	});
	$('#register-form').off('submit').on({
		submit: function(event){
			event.preventDefault();
			let names = [];
			$.each($(this).serializeArray(), function(index, value){
				names.push(value.name)
			});
			names.splice( names.indexOf('adp_start_date'), 1 );
			names.splice( names.indexOf('adp_end_date'), 1 );
			submitForm($(this), function(data){
				window.location.href = "login";
			});
		}
	});
</script>
</body>
</html>