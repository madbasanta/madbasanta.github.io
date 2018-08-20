<?php

$request = $_POST;
try {
	$app["database"]->insert("newsletter", $request);
	$_SESSION["success"] = "You have successfully subscribed form newsletter.";
} catch (Exception $e) {
	$_SESSION["errors"] = "Whoops ! Something went wrong!";
}
header("Location: " . $_SERVER["HTTP_REFERER"]);