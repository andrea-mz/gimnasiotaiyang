<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usuario=User::create([
            'name'=>'andrea',
            'email'=>'andrea@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('admin')
        ]);

        $usuario->assignRole('admin');
        User::factory(9)->create();
        
    }

}