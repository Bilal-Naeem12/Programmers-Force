<?php
//simple function
function sayHello(
    $name="abc",
) {

    echo "helloo " . $name;
}

sayHello();



function multiply($a,$b) {   




    return $a * $b; 
}


$result = multiply(4,2);
echo "<br> a * b = ". $result ."";
