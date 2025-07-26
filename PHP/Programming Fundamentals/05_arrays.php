<?php




// $fruits = ["Apple","Orange","Banana"];
// echo $fruits[2] . "<br>";

// $fruits[3] = "Peach";

// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';


// $mixedArr = ["Hello",12,true];

// echo '<pre>';
// var_dump($mixedArr);
// echo '</pre>';


//Associative Array 


$assocaitiveArr = [
'name' => 'Bilal',
'anotherArr'=> [
    10,"kia hai",
    ['further'=>'bht nested hu mai ' ]
],


];


echo $assocaitiveArr['anotherArr'][2]['further'];