<?php
$request = $_POST;
$request["user_name"] = $user->name;
$request["created_at"] = date('Y-m-d');

try {
	$app["database"]->insert("posts", $request);
	$_SESSION["success"] = "Your post is posted successfully.";
} catch (Exception $e) {
	$_SESSION["errors"] = "Whoops ! Can not post this post!";
}
header("Location: /forum");