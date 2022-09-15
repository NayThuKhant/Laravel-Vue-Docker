<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Passport\Client;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            SuperAdminSeeder::class,
        ]);

        User::factory(1000)->create();

        //Passport Client
        Client::create([
            'name' => 'YLA',
            'secret' => 'e4X7lL4dZCkzJJveesmk6vJZQ5q3zdKftixWeoIt',
            'redirect' => config('app.url'),
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
        ]);
    }
}
