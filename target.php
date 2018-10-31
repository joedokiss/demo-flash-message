<?php
# include the 'Loader.php'
require './Application/Autoload/Loader.php';

# initiate the auto loader
Application\Autoload\Loader::init(__DIR__);

if (!session_id()) @session_start();

print_r($_SESSION);

// Instantiate the class
$msg = new Application\Plasticbrain\FlashMessages();

$msg->display();