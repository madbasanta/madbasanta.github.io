<?php
if(!authCheck()){
	header("Location: /");
	return false;
}

$request =  $_POST;

foreach($request as $key => $val):
	if($request[$key] == null || $request[$key] == ""){
		if(!$key == "image")
		$errors[$key] = 'required';
	}
endforeach;

if(count($errors)){
	$_SESSION["errors"] = $errors;
	header("Location: /profile");
	return false;
}

if($_FILES["image"]["size"] > 0){
	$allowedtype = ["jpg", "png", "jpeg", "gif"];
	$target_dir = "public/images/users/";
	$target_file = $target_dir . time() . basename($_FILES["image"]["name"]);
	$type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$uploadOK = 1;
	if(file_exists($target_file)){
		$_SESSION["errors"] = "File already exists!";
		$uploadOK = 0;
	}
	if($_FILES["image"]["size"] > 1024*2000){
		$_SESSION["errors"] = "File is too large!";
		$uploadOK = 0;
	}
	if(!in_array($type, $allowedtype)){
		$_SESSION["errors"] = "File type is not supported!";
		$uploadOK = 0;
	}
	if($uploadOK && md5($request["password"]) === $user->password){
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		try {
			$app["database"]->update("users", $user->id, ["image" => $target_file]);
		} catch (Exception $e) {
			$_SESSION["errors"] = "Error occured while uploading file!";
		}
	}
}
if(md5($request["password"]) === $user->password) {
	$condition = true;
	unset($request["password"]);
	if(isset($request["new_password"]))	{
		if($request["new_password"] !== $request["c_password"]){
			$condition = false;
			$_SESSION["errors"] = "Confirm password doesn't match!";
		}
		$request["password"] = md5($request["new_password"]);
		unset($request["new_password"], $request["c_password"]);
	}
	if($condition) {
		try {
			$app["database"]->update("users", $user->id, $request);
			$_SESSION["success"] = "Profile information updated successfully.";
		} catch (Exception $e) {
			$_SESSION["errors"] = "Error occurred while processing data!";
		}
	}
}else{
	$_SESSION["errors"] = "Password doesn't match!";
}
header("Location: /profile");