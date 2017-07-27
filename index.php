<?php

// Include Config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controller/home.php');
require('controller/shares.php');
require('controller/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller) {
	$controller->executeAction();
}