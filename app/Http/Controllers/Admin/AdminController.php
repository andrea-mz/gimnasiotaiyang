<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Activity;
use App\Models\Hour;
use App\Models\Reservation;

class AdminController extends Controller
{

    public function __construct() {

        $this->middleware("auth");

    }

    public function index() {

        if(Auth::user()->hasroles('admin'))
            return view('auth.admin.index');
        else
            return view('error.index');

    }

    public function list_users() {

        if(Auth::user()->hasroles('admin')) {

            $users=User::all();
            return view('auth.admin.list_users', compact('users'));

        }

    }

    public function list_activities() {

        if(Auth::user()->hasroles('admin')) {

            $activities=Activity::all();
            return view("auth.admin.list_activities", compact("activities"));

        }

    }

    public function list_hours() {

        if(Auth::user()->hasroles('admin')) {

            $hours=Hour::with('activity')->get(); //no coge activity
            $activities=Activity::all();
            return view("auth.admin.list_hours", compact("hours", "activities"));

        }

    }

    public function list_reservations() {

        if(Auth::user()->hasroles('admin')) {

            $reservations=Reservation::all();
            return view("auth.admin.list_reservations", compact("reservations"));

        }

    }

    public function create_activities() {

        if(Auth::user()->hasroles('admin')) {

            $activity=new Activity;
            $title=__("Crear actividad");
            $textButton=__("Crear");
            $route=route("activities.store");
            return view("auth.admin.create_activities", compact("activity"));

        }


    }

}
