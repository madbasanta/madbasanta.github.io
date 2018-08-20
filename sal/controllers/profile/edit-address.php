<?php
if(!authCheck()){
	header("Location: /");
	return false;
}

$request = $_POST;

foreach($request as $key => $val):
	if($request[$key] == null || $request[$key] == "")
		$errors[$key] = 'required';
endforeach;

if(count($errors)){
	$_SESSION["errors"] = $errors;
	header("Location: /profile");
	return false;
}
try {
	$app["database"]->update("users", $user->id, $request);
	$_SESSION["success"] = "Address information is updated.";
	header("Location: /profile");
} catch (Exception $e) {
	$_SESSION["errors"] = "Error occurred while processing data!";
	header("Location: /profile");
}