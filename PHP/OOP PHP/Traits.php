<?php

trait Hello{
public function sayHello(){
echo "helloo everyone";
}
}

class A{

use Hello;

}

class B{

use Hello;

}


$obj = new A();
$obj->sayHello();
echo "<br>";
$obj = new B();
$obj->sayHello();



?>