<?php require('views/includes/head.php'); ?>
<div class="container">
	<h2 class="font-weight-bold mt-2 clearfix"><span class="float-left">
		Forum
	<small class="new-forum d-none">| New&nbsp;Forum</small></span>
	<span class="btn btn-sm btn-primary mt-1 float-right" id="create-forum">Create Forum</span>
	</h2>
	<hr class="mt-0 mb-0 bg-success">
	<div class="new-forum d-none">
		<form action="/forum/create" method="POST">
			<div class="row">
				<div class="col-lg-12">
					<div class="mt-3">
						<label class="mb-2 h4">Title</label>
						<textarea name="title" class="form-control" required rows="3"
						placeholder="Write your question here..."></textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="Create" class="mt-3 btn btn-primary">
			</div>
			<hr style="background: lightgray">
		</form>
	</div>
	<div class="forums-container mt-3">
		<?php foreach($posts as $post): ?>
		<div class="mb-3">
			<h5><?= $post["forum"] ?></h5>
			<?php foreach($post["posts"] as $body): ?>
			<div class="clearfix mb-3">
				<span style="width: 50px; height: 50px; overflow: hidden;" 
				class="float-left table-bordered rounded-circle">
					<img src="<?= $body->image ? $body->image : "/public/images/no-user.jpg" ?>"
					 alt="<?= $body->name ?>" class="img-fluid">
				</span>
				<span class="bg-light p-1 px-3 float-left" style="min-height: 50px;border-radius: 20px;max-width: calc(100% - 50px)">
					<?= $body->body ?>
				</span>
			</div>
			<?php endforeach; ?>
		</div>
		<form action="/post/create" method="POST">
			<div class="form-group">
				<textarea name="body" rows="3" class="form-control" required
				placeholder="Write your message here.."></textarea>
				<input type="submit" value="Post" class="px-4 mt-3 pointer">
				<input type="hidden" name="forum_id" value="<?= $post["id"] ?>">
			</div>
			<hr style="background: lightgray">
		</form>
		<?php endforeach; ?>
	</div>
</div>
<?php require('views/includes/footer.php'); ?>
</body>
</html>