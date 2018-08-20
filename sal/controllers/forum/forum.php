<?php
if(!authCheck()){
	header("Location: /login");
	return false;
}

$forums = $app["database"]->all("forum");

foreach($forums as $key => $forum):
	$posts[$key]["id"] = $forum->id;
	$posts[$key]["forum"] = $forum->title;
	$posts[$key]["posts"] = $app["database"]->selectRaw("SELECT posts.*, users.name, users.image, users.locality FROM posts LEFT JOIN users ON posts.user_name = users.name WHERE forum_id={$forum->id}");
endforeach;
require "views/forum/forum.php";