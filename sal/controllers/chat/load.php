<?php

if(authCheck()):

	$chats = $app["database"]->selectRaw("SELECT chats.message, chats.user_id, users.image FROM chats LEFT JOIN users ON chats.user_id = users.id ORDER BY chats.created_at");

	foreach($chats as $msg):
		if($msg->user_id == $user->id):
?>
			<div class="clearfix mt-1 p-1">
				<span class="image my" style="float: right;">
					<img class="img-fluid" src="<?= $msg->image ? $msg->image : "/public/images/no-user.jpg" ?>">
				</span>
				<span class="message my p-2 text-muted" style="float: right;">
					<?= $msg->message ?>
				</span>
			</div>
<?php 
		else:
?>
			<div class="clearfix mt-1 p-1">
				<span class="image">
					<img class="img-fluid" src="<?= $msg->image ? $msg->image : "/public/images/no-user.jpg" ?>">
				</span>
				<span class="message p-2 text-muted">
					<?= $msg->message ?>
				</span>
			</div>
<?php 
		endif;
	endforeach;
endif;
?>