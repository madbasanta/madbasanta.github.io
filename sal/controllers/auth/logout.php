<?php 
if(authCheck()){
	unset($_SESSION["auth"]);
}
header("Location: /");