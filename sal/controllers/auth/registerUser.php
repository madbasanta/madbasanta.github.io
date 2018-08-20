<?php
$request = $_POST;
foreach ($request as $key => $value) {
    if($value == "" || $value == null)
        unset($request[$key]);
}
if($request["password"] === $request["c_password"]):
	unset($request["c_password"]);
	if($request["addopted"] == "on")
		$request["addopted"] = 1;
	
    $request["password"] = md5($request["password"]);
    header('Content-Type: application/json; charset=UTF-8');
    try {
        $run = $app['database']->insert('users', $request);
    	print_r( json_encode(array('message' => 'SUCCESS', 'code' => 200)));
    } catch (Exception $e) {
        print_r( json_encode(array('message' => 'ERROR', 'code' => 500)));
    }
        
endif;