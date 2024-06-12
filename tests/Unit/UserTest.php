<?php

namespace Tests\Unit;

use App\Models\UserTest as ModelsUserTest;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_user_there()
    {
        $name='john';
        
        $this->assertDataBaseHas('user_tests',[
            'name'=>$name,
        ]);

    }

    public function test_user_duplication()
    {
        $user1=ModelsUserTest::find(2); //alias name ModelsUserTest
        $user2=ModelsUserTest::find(3);

        $this->assertTrue($user1->email != $user2->email);

    }

    public function test_user_delete()
    {
        $user=ModelsUserTest::find(1);
        if($user)
        {
            $user->delete();
            $this->assertTrue(true);
        }
        else
        {
            $this->assertFalse(true);
        }

       
    }

}
