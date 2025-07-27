<?php



class Car{

private $brand;
private $color;

public function __construct($brand,$color){


    $this->brand = $brand;
    $this->color = $color;

} 
public function getBrand(){

    return "This the brand". $this->brand;
}


public function getColor(){ 
    return $this->color;
}
public function setBrand($brand){   

    $this->brand = $brand;
}
public function setColor($color){
    $allowedColor = ["red","green","yellow"];

    if(in_array($color, $allowedColor)){
        $this->color = $color;
    }


}


public function getCarInfo(){
    return "Brand: " .  $this->brand . ", Color: ". $this->color;
    }

}