<?php 
if(!authCheck())
	require('views/auth/login.view.php');
else
	header("Location: /");