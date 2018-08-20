<?php
$request = $_POST;

if(authCheck()) {
	try {
		$app['database']->insert('chats', $request);
		return print_r(200);
	} catch (\Exception $e) {
		return print_r(422);
	}
}
return print_r(200);