<?php 
$request = $_POST;
$errors = [];

$c_name = md5($request['email']);
$c_value = $_COOKIE[$c_name] ? $_COOKIE[$c_name] + 1 : 1;
setcookie($c_name, $c_value, time() + (60*5));

if(intval($_COOKIE[$c_name]) >= 3):
	$_SESSION["errors"] = "Too many login attempts! Try again after 5 minutes.";
	header("Location: login");
	return false;
endif;

foreach($request as $key => $val):
	if($request[$key] == null || $request[$key] == "")
		$errors[$key] = 'required';
	if($key == 'password')
		$request['password'] = md5($request["password"]);
endforeach;

if (count($errors) > 0) {
	$_SESSION["errors"] = $errors;
	header("Location: login");
	return false;
}
try {
	$user = $app['database']->select('users', $request);
} catch (Exception $e) {
	$_SESSION['errors'] = "Error occurred while processing the data!";
	header("Location: login");
}
if(count($user) > 0):
	setcookie($c_name, 1, time() - 3600);
	$_SESSION['auth'] = $user[0];
	header("Location: /");
else:
	$_SESSION['errors'] = "Login credentials didn't match!";
	header("Location: login");
endif;