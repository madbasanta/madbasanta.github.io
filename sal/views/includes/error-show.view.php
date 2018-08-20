<?php if(isset($_SESSION["errors"])): ?>
<div class="alert alert-danger mb-0 text-center">
	<?php if(is_string($_SESSION["errors"])): ?>
	<span class="text-danger"><?= $_SESSION["errors"] ?></span>
	<?php else: ?>
	<span class="text-danger">Whoops ! Something went wrong.</span>
	<?php endif; ?>
</div>
<?php unset($_SESSION["errors"]); ?>
<?php endif; ?>
<?php if(isset($_SESSION["success"])): ?>
<div class="alert alert-success mb-0 text-center">
	<?php if(is_string($_SESSION["success"])): ?>
	<span class="text-success"><?= $_SESSION["success"] ?></span>
	<?php else: ?>
	<span class="text-success">Great !! Operation completed.</span>
	<?php endif; ?>
</div>
<?php unset($_SESSION["success"]); ?>
<?php endif; ?>