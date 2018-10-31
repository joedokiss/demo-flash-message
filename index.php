<?php
/*
* Autoloader
*/

# include the 'Loader.php'
require './Application/Autoload/Loader.php';

# initiate the auto loader
Application\Autoload\Loader::init(__DIR__);

//require __DIR__.'/Application/Plasticbrain/FlashMessages.php';

// Start a Session
if (!session_id()) @session_start();
	
if (isset($_POST['submitform'])){
	$msg = new Application\Plasticbrain\FlashMessages();
	// $msg->success('This is a success message', 'target.php');
	$msg->error('This is an error message', 'target.php');
}


print_r ($_SESSION);

// Add messages
// $msg->info('This is an info message');
// $msg->success('This is a success message', 'target.php');
// $msg->warning('This is a warning message', 'target.php');
// $msg->error('This is an error message', 'target.php');

// If you need to check for errors (eg: when validating a form) you can:
// if ($msg->hasErrors()) {
// 	// There ARE errors
// 	echo 'has errors';echo "<br>";
// } else {
//   // There are NOT any errors
// 	echo 'no errors';echo "<br>";
// }
	
// // Wherever you want to display the messages simply call:
// $msg->display();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
  	<div id = 'info_message'>
  		<?php 
  			if (!empty($info_message)) echo $info_message;
  			unset($info_message);
  		?>
  	</div>
    <div id='container'>
		<form id='myForm' method = 'POST' name = 'myForm' action = '' >
			<div class="form-group">
			    <label for="statenews">Example textarea:</label>
			    <textarea class="form-control" id="statenews" name='statenews' rows="3"></textarea>
			 </div>
			 
			<button type="submit" class="btn btn-primary" name = 'submitform' id = 'submitform'>Submit</button>
		</form>
    </div>

    <script>
    	function chg(){
    		//var e = document.getElementById('austate');
			//var selectedState = e.options[e.selectedIndex].value;
    		//document.getElementById("myForm").submit();
    	}
    </script>
  </body>
</html>
