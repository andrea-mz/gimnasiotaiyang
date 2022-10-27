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
        $this->seedServices();
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

    public function seedServices() {

        $ids=[
            "1",
            "2",
            "3",
            "4",
            "5",
            "6"
        ];

        $nombres=[
            "Entrenador personal",
            "Tatami para artes marciales",
            "Nutricionista",
            "Sala Fitness",
            "Material deportivo en buen estado",
            "Taquillas personales"
        ];

        $imagenes=[
            "serv/pexels-photo-6456305.jpeg",
            "serv/suelo-goma-eva.jpg",
            "serv/pexels-photo-1640777.jpeg",
            "serv/pexels-photo-3823204.jpg",
            "serv/pexels-photo-703012.jpeg",
            "serv/pexels-photo-5383994.jpeg"
        ];

        for($i=0;$i<count($nombres);$i++) {

            DB::table('services')->insert([
                'id'=>$ids[$i],
                'name'=>$nombres[$i],
                'image'=>$imagenes[$i],
            ]);

        }


    }

    public function seedReservations() {

        Reservation::factory(20)->create();

        /*$fechas=[
            "05/01/2022",
            "08/02/2022",
            "24/04/2022",
            "07/01/2022",
            "15/01/2022",
            "30/03/2022",
            "15/01/2022",
            "25/03/2022",
            "30/04/2022",
            "06/02/2022",
            "14/01/2022",
            "28/01/2022",
            "05/02/2022",
            "27/01/2022",
            "13/04/2022",
            "29/03/2022",
            "02/04/2022",
            "04/03/2022",
            "26/01/2022",
            "12/02/2022"
        ];

        foreach ($fechas as $date) {

            Reservation::create(compact('date'));

        }*/

    }

}
