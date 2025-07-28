<?php

use second\Test;


// require "Namespace/First.php";
// require "Namespace/Second.php";


function __autoload($class){
require "Namespace/" . $class .".php";


}

$test = new Test() ;