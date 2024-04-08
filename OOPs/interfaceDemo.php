<?php
interface maths{
    public function add();
    public function sub($arg);
    public function mul():int;
}

class sum implements maths{
    public $a=5;
    public $b=2;

    public function add()
    {
        echo $this->a+$this->b;
    }
    public function sub($arg)
    {
        echo ($this->a+$this->b)-$arg;
    }
    public function mul():int
    {
        return  $this->a*$this->b;
    }
}
$obj=new sum();
$obj->add();
$obj->sub(1);
echo $obj->mul();


?>