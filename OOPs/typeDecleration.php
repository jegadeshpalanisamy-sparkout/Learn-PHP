<?php
declare(strict_types=1);
class TypeDecDemo{
  
        public $name;
        function setName(string $name)
        {
            $this->name=$name;
        }
        function getName()
        {
            return $this->name;
        }
    
   
}
 $obj=new TypeDecDemo();
 try{
    $obj->setName(1);
 echo $obj->getName();
 }
 catch (TypeError $e)
 {
    echo "error:". $e->getMessage();
 }
 




?>