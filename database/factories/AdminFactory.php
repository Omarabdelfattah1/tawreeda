<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;
class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    
    public function definition()
    {
        return [
            'name' => 'Admin',
            'role' => 'admin',
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Admin $admin) {
            $admin->user()->create([
                'name' => env('TAWREEDA_ADMIN_NAME'),
                'email' => env('TAWREEDA_ADMIN_EMAIL'),
                'password' => Hash::make(env('TAWREEDA_ADMIN_PASSWORD')),
                'photo' => 'users/photos/admin.png',
                'mobile' => env('TAWREEDA_ADMIN_MOBILE'),
                'remember_token' => Str::random(10),
                'title' =>'مدير',
                'summary' => 'مدير'
            ]);
        });
    }
}
