<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class MyFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'myfacade';
    }

}

?>