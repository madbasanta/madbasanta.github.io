<?php 
function dd($value) {
	echo "<pre>";
	echo var_dump($value);
	echo "</pre>";
	die();
}

function authCheck(){
	if(isset($_SESSION["auth"]))
		return true;
	return false;
}

function auth(){
	if(!isset($_SESSION["auth"]))
		return false;
	return (object) $_SESSION["auth"];	
}
if(authCheck()){
	$temp = $app["database"]->selectId("users", auth()->id);
	if(count($temp))
		$user = $temp[0];
	else
		unset($_SESSION["auth"]);
}

function gender(){
	return [
		"Male",
		"Female",
		"Other"
	];
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp