<?php


 class GPS{

    public function getInfo(){

        echo"Im GPS";

    }
    protected $x_cordinates;
    protected $y_cordinates;
    public function __construct($x_cordinates, $y_cordinates){
        $this->x_cordinates = $x_cordinates;
        $this->y_cordinates = $y_cordinates;
    }


}



class Phone extends GPS{
   public $color = "";
    public function __construct($x_cordinates, $y_cordinates,$color){
       parent::__construct($x_cordinates+2, $y_cordinates);
        $this->color = $color;
    }
public function getInfo(){
    echo " ( ". $this->x_cordinates . ",".$this->y_cordinates.") ".$this->color;


}




}


$gps = new GPS(23, 43);

$phone = new Phone(24,45,"yellow");
$phone->getInfo();