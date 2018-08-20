<?php
session_start();

require 'core/bootstrap.php';

require 'functions.php';

require "controllers/".Router::load('routes.php')->direct(Request::uri(), Request::method());
