<div class="row">
	<div class="col-md-12" style="position: relative;">
		<div class="messages" id="chats">
			<header style="height: 50px;background: #237a57;">
				<h4 class="text-center py-2 clearfix">
					Chat
					<span class="float-right mr-2 pointer" id="close-chat">&times;</span>
				</h4>
			</header>
			<article class="message-container">
				
			</article>
			<footer style="height: 70px;border-top: 1px solid #f9f9f9;" class="bg-dark pt-1">
				<form action="chat/send" method="POST">
					<textarea name="message" class="form-control ml-1" rows="2" style="width: calc(100% - 54px);float: left;background: #f1f1f1;font-size: 90%;" placeholder="Write..."></textarea>
					<input type="hidden" name="user_id" value="<?= $user->id ?>">
					<button type="submit" class="send-btn pointer">
						<i class="fas fa-chevron-circle-right"></i>
					</button>
				</form>
			</footer>
		</div>
	</div>
</div>