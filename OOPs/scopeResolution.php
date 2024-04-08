<?php
    class A{
        const name="cannot change";

        public static function test()
        {
            echo self::name; //it access self class variable
        }
    }
    A::test();//it allows to access outside of the satic function
    class B extends A{
        const age=21;
        public static function test2()
        {
            echo self::age;
            echo parent::test();
            echo parent::name;
             
        }
    }
    B:: test2();


?>