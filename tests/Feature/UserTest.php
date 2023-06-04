<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    private $password = 'testPassord';

    /**
     * Test user creation.
     */
    public function testUserCreation(): void
    {
        $name = $this->faker->name();
        $email = $this->faker->email();
        $response = $this->postJson('/api/auth/signup', [
            'name' => $name,
            'email' => $email,
            'password' => $this->password,
            'password_confirmation' => $this->password,
        ]);

        $response
            ->assertStatus(201)
            ->assertExactJson([
                'message' => 'User created successfully!'
            ]);
    }

    /**
     * Test user creation.
     */
    // public function testUserLogin(): void
    // {
    //     $name = $this->faker->name();
    //     $email = $this->faker->email();

    //     $user = new User([
    //         'name' => $name,
    //         'email' => $email,
    //         // 'password' => $this->password,
    //         'password' => bcrypt($this->password),
    //     ]);

    //     $response = $this->postJson('/api/auth/login', [
    //         'email' => $email,
    //         'password' => $this->password,
    //         // 'remember_me' => true,
    //     ]);

    //     $response->assertStatus(200);
    //     $this->assertAuthenticated();
    // }
    
}
