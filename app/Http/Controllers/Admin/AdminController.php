<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Group;
use App\Models\Song;

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
    
    public function list_groups() {

        if(Auth::user()->hasroles('admin')) {

            $groups=Group::all();
            return view("auth.admin.list_groups", compact("groups"));

        }
        
    }

    public function list_songs() {

        if(Auth::user()->hasroles('admin')) {

            $songs=Song::all();
            return view("auth.admin.list_songs", compact("songs"));

        }
        
    }

    public function create_groups() {

        if(Auth::user()->hasroles('admin')) {

            $project=new Project;
            $title=__("Crear proyecto");
            $textButton=__("Crear");
            $route=route("projects.store");
            //dd($route);
            return view("auth.admin.create_projects", compact("project"));

        }
        

    }
    
}
