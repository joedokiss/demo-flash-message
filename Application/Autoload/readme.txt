# assuming there is a folder under the root, like /Root/Application

# include the 'Loader.php'
require './Application/Autoload/Loader.php';

# initiate the auto loader
Application\Autoload\Loader::init(__DIR__);

# test case 1:
$test = new Application\Test\TestClass();
echo $test->getTest();

<?php
namespace Application\Test;

class TestClass{
	public function __construct(){
		//
	}
	
	public function getTest(){
		//output: Application\Test\Test::getTest
		echo __METHOD__;
	}
}

# test case 2:
$filter = new App\SafeFilter();
echo $filter->getHello();

<?php 

namespace App;

class SafeFilter{
	public function __construct(){
	
	}
	
	public function getHello(){
		echo 'hello App';
	}
}