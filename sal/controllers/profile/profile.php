<?php 
if(!authCheck()){
	header("Location: /");
	return false;
}

$sd = $user->adp_start_date;
$ed = strtotime($user->adp_end_date);

$today = strtotime("today midnight");

if($today > $ed){
	$days = ($today - $ed)  / (60 * 60 * 24);
    $remaining = "expired ". (int) $days." day(s) ago";
    if($days > 365*2)
    	$app["database"]->delete("users", $user->id);
} else {
	$days = ($ed - $today)  / (60 * 60 * 24);
    $remaining = (int) $days." day(s)";
}
try {
	$result = $app["database"]->selectRaw("SELECT d.pay_amt FROM users LEFT JOIN donors AS d ON users.id = d.user_id WHERE users.id = {$user->id}");
	$fee = 0;
	if(count($result)) {
		foreach($result as $amt):
			$fee += $amt->pay_amt;
		endforeach;
	}
} catch (Exception $e) {
	
}

require "views/profile/profile.view.php";