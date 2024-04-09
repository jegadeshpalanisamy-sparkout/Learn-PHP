<?php

//Check if the interface is already declared before declaring it
if (!interface_exists('ShapeInf')) {
    interface ShapeInf {
        public function area();
    }
}



?>
