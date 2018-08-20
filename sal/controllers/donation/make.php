<?php
$request = $_POST;

$u["adp_start_date"] = $request["adp_start_date"];
$u["adp_end_date"]	 = $request["adp_end_date"];

try {
	$app["database"]->update("users", $request["user_id"], $u);
} catch (Exception $e) {
	$_SESSION["errors"] = "Whoops ! Something went wrong.";
}

$data["user_id"] = $request["user_id"];
$data["pay_amt"] = $request["pay_amt"];
$data["pay_date"] = date("Y-m-d");
try {
	$subs = $app["database"]->selectId("users", $user->id);
	if(count($subs)){
		$sd = $subs[0]->adp_start_date;
		$ed = $subs[0]->adp_end_date;
	}
	if(isset($sd) && isset($ed)){
		$app["database"]->insert("donors", $data);
		$_SESSION["success"] = "Thanks for your incredible support!!";
	}else{
		$_SESSION["errors"] = "Please fill your adoption start and end date.";
	}
} catch (Exception $e) {
	$_SESSION["errors"] = "Whoops ! Something went wrong.";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);