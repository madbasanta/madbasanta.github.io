<section>
	<div class="text-center mt-3">
		<a class="p-2 table-bordered bg-dark px-5 text-white pointer <?= authCheck() ? "show-modal" : "" ?>" 
		data-id="d_modal" href="/login">Donate Now !!</a>
	</div>

	<?php include_once "donate.view.php"; ?>

</section>
<?php include_once "image-slider.php"; ?>
<footer id="page-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="text-white mt-3">
					<h4>SAVE AN AMUR LEOPARD</h4>
					<address style="color: #ccc;">
						1250 24th Street, N.W. <br>
						Washington, DC 20037-1193 <br>
						UNITED STATES <br>
						(202) 293-4800
					</address>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<div class="mt-3 text-white">
							<h4>Live Chat</h4>
							<div class="table-bordered p-2 pointer" id="open-chat">
								Click here to chat !
							</div>

							<?php include_once "chats.view.php"; ?>

						</div>
					</div>
					<div class="col-md-6 clearfix">
						<div class="mt-3 text-white float-md-right w-100">
							<h4 class="text-center">NEWSLETTER</h4>
							<form action="/newsletter" method="POST" class="mb-3">
								<input type="email" name="email" class="mb-3 mt-2 rounded-0 form-control"
								placeholder="john@gmail.com" autocomplete="off" required>
								<input type="submit" value="Subscribe" 
								class="btn btn-success rounded-0 d-block m-auto">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'bottom-footer.view.php'; ?>

</footer>

<script src="/public/js/jquery.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.rotating-slider.min.js"></script>
<script src="/public/js/custom.js"></script>
<script>
	$('html').not(document.getElementsByClassName('.person-name')).on('click', function(event) {
		$('ul.person-dropdown').slideUp();
	});
	$('.person-name').off('click').on({
		click: function (event) {
			event.stopPropagation();
			$(this).children('ul.person-dropdown').slideToggle();
		}
	});
	$(function () {
		$(document).off('click', '#close-chat')
		.on('click', '#close-chat', function(event) {
			event.preventDefault();
			$(document).find('#chats').slideUp();
		});
		$(document).off('click', '.show-modal').on('click', '.show-modal', function(event) {
		    event.preventDefault();
		    $('#' + $(this).data('id')).modal('show');
		});
		$(document).off('click', '#open-chat')
		.on('click', '#open-chat', function(event) {
			event.preventDefault();
			$(document).find('#chats').slideDown();
			scrollBottom();
		});
		$(document).off('click', '.send-btn')
		.on('click', '.send-btn', function(event) {
			event.preventDefault();
			let form = $(this).closest('form');
			let data = form.serializeArray();
			let url = form.attr('action');
			if(data[0].value != "" && data[0].value != null)
				$.post(url, data, function(data, status) {
					if(status == 'success')
						reload();
					scrollBottom();
					form[0].reset();
				});
		});
		function scrollBottom() {
			$(".message-container").animate({ scrollTop: $(this).height() }, "slow");
		}
		function reload() {
			let url = 'chat/load';
			$.post(url, function(data, status) {
				$(document).find('.message-container').html(data);
			});
		}
		reload();
		setInterval(reload, 3000);
	});
</script>







