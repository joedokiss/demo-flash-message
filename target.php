<?php
# include the 'Loader.php'
require './Application/Autoload/Loader.php';

# initiate the auto loader
Application\Autoload\Loader::init(__DIR__);

if (!session_id()) @session_start();

// Instantiate the class
$msg = new Application\Plasticbrain\FlashMessages();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Flash - target</title>
  </head>
  <body>
  	<?php $msg->display(); ?>
  </body>
</html>
