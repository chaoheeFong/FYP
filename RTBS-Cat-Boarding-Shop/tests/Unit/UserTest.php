<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     * 
     */
    public function test_login_form():void
    {
        $response = $this->get('/login/user');

        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'John',
            'email' => 'john@gmail.com'
        ]);

        $this->assertTrue($user1->name);
    }

}
