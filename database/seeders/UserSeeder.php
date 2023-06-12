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

        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@gymtaiyang.es',
            'email_verified_at'=>now(),
            'password'=>Hash::make('admin')
        ]);
        $admin->assignRole('admin');

        $cliente=User::create([
            'name'=>'guest',
            'email'=>'guest@gymtaiyang.es',
            'email_verified_at'=>now(),
            'password'=>Hash::make('guest')
        ]);
        $cliente->assignRole('guest');

        User::factory(8)->create();

    }

}
