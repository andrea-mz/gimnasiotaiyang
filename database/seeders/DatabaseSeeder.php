<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Activitie;
use App\Models\Service;
use App\Models\Reservation;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        DB::table('role_user')->insert([
            'user_id'=>'1',
            'role_id'=>'1',
        ]);
        $this->seedRelationRolesUser();
        $this->seedActivities();
        $this->seedHours();
        $this->seedReservations();

    }

    public function seedRelationRolesUser() {

        $roles=Role::where('name','<>','admin')->get();
        $users=User::where('name','<>','andrea')->get();

        foreach ($users as $user) {

            $user->roles()->attach($roles->random());

        }

    }

    public function seedActivities() {

        $short=[
            "ACF",
            "AQG",
            "BDS",
            "BOX",
            "CIR",
            "COR",
            "GAP",
            "HIT",
            "KGX",
            "PIL",
            "STR",
            "TKD",
            "TRX",
            "YOG",
            "ZUM"
        ];

        $nombres=[
            "Acondicionamiento Físico",
            "Aquagym",
            "Bodystep",
            "Boxeo",
            "Ciclo Indoor",
            "Core",
            "G.A.P.",
            "HIIT",
            "Kickboxing",
            "Pilates",
            "Stretch",
            "Taekwondo",
            "TRX",
            "Yoga",
            "Zumba"
        ];

        $imagenes=[
            "act/pexels-photo-8032753.jpeg",
            "act/pexels-photo-863988.jpeg",
            "act/bodystep.jpg",
            "act/pexels-photo-4754139.jpeg",
            "act/pexels-photo-4046657.jpeg",
            "act/bicycleAbCruches-1216161742_770x553-650x428.jpg",
            "act/pexels-photo-4498577.jpeg",
            "act/pexels-photo-1552242.jpg",
            "act/pexels-photo-598686.jpeg",
            "act/pexels-photo-1103242.jpeg",
            "act/pexels-photo-209969.jpeg",
            "act/pexels-photo-7045384.jpeg",
            "act/1366_2000.jpeg",
            "act/pexels-photo-3823039.jpeg",
            "act/zumfinal.jpg"
        ];

        for($i=0;$i<count($short);$i++) {

            DB::table('activities')->insert([
                'shortname'=>$short[$i],
                'name'=>$nombres[$i],
                'image'=>$imagenes[$i],
            ]);

        }

    }

    public function seedHours() {

        $activ=[
            "ACF",
            "AQG",
            "BDS",
            "BOX",
            "CIR",
            "COR",
            "GAP",
            "HIT",
            "KGX",
            "PIL",
            "STR",
            "TKD",
            "TRX",
            "YOG",
            "ZUM",
            "CIR",
            "COR",
            "GAP",
            "HIT",
            "KGX",
            "PIL"
        ];

        $dias_semana=[
            "Viernes",
            "Miércoles",
            "Sábado",
            "Domingo",
            "Viernes",
            "Jueves",
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Lunes",
            "Sábado",
            "Viernes",
            "Lunes",
            "Martes",
            "Miércoles",
            "Sábado",
            "Domingo",
            "Miércoles",
            "Jueves"
        ];

        $horas=[
            "09:30 - 10:30",
            "11:00 - 12:00",
            "10:30 - 11:30",
            "17:00 - 18:00",
            "12:00 - 13:00",
            "11:30 - 12:30",
            "19:30 - 20:30",
            "10:30 - 11:30",
            "13:00 - 14:00",
            "11:30 - 12:30",
            "18:00 - 19:00",
            "12:30 - 13:30",
            "16:30 - 17:30",
            "20:30 - 21:30",
            "18:30 - 19:30",
            "16:00 - 17:00",
            "09:30 - 10:30",
            "12:00 - 13:00",
            "15:00 - 16:00",
            "17:30 - 18:30",
            "14:30 - 15:30"
        ];

        for($i=0;$i<count($activ);$i++) {

            DB::table('hours')->insert([
                'act_shortname'=>$activ[$i],
                'day_of_the_week'=>$dias_semana[$i],
                'hour'=>$horas[$i],
            ]);

        }

    }

    public function seedReservations() {

        Reservation::factory(20)->create();

    }

}
