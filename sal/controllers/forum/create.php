<?php
$request = $_POST; 
try {
	$app["database"]->insert("forum", $request);
	$_SESSION["success"] = "Forum created successfully.";
} catch (Exception $e) {
	$_SESSION["errors"] = "Whoops ! Can not create the forum !";
}
header("Location: /forum");