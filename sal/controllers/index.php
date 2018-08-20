<?php

$visitors = $app["database"]->all('visitors');

if(is_array($visitors) && count($visitors)){
	$visitors = $visitors[0];
}
else{
	$visitors = 0;
}

if($visitors){
	if(!authCheck())
		$app['database']->update('visitors', $visitors->id, [
			"visitors" => $visitors->visitors + 1
		]);
}
else{
	$result = $app["database"]->insert('visitors', ['visitors' => 1]);
}

$visitors = $app["database"]->all('visitors')[0];
$count = $visitors->visitors;
$count = 2;
echo "this is test";
require 'views/index.view.php';
