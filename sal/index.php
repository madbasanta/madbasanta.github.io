<?php
session_start();

require 'core/bootstrap.php';

require 'functions.php';
echo "index";
// require "controllers/".Router::load('routes.php')->direct(Request::uri(), Request::method());
