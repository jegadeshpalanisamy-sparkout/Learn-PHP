<?php
class Car{
public $name;
public $color;

public function __construct($name,$color) {
$this->name=$name;
$this->color=$color;

}

function getCardetails()
{
return $this->name ." ". $this->color;
}
}

?>