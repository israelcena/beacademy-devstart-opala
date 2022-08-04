<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'cpf' => fake()->unique()->cpf(),
            'name' => fake()->name(),
            'is_admin' => false,
            'birth_date' => fake()->dateTime()->format('d-m-Y'),
            'cep' => fake()->postcode(),
            'country' => fake()->locale(),
            'place' => fake()->address(),
            'district' => fake()->city(),
            'residence_number' => fake()->buildingNumber(),
            'phone' => fake()->e164PhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
