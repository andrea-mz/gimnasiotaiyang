<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ActivitieController extends Controller
{
    public function __construct()
    {
        //$this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $activities=Activitie::paginate(10);

        return view("activities.index", compact("activities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $group = new Group;
        $title = __("Añadir grupo");
        $textButton = __("Añadir");
        $route = route("groups.store");
        return view("groups.create", compact("title", "textButton", "route", "group"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|max:140|unique:activities",
            "imagen"=>"required|image|mimes:jpg,gif,png,jpeg|"

        ]);

        Activitie::create(

            array_merge(

                $request->only("name"),[

                    "image"=>$file->storeAs('',uniqid()."-".$file->getClientOriginalName(),'images')

                ]

            )

        );

        return redirect(route("activities.index"))
            ->with("success", __("¡Actividad añadida con éxito!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Activitie $act)
    {
        $update = true;
        $title = __("Editar actividad");
        $textButton = __("Actualizar");
        $route = route("activitie.update", ["activitie" => $act]);
        return view("activitie.edit", compact("update", "title", "textButton", "route", "activitie"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Activitie $act)
    {
        $this->validate($request, [

            "name" => "required|unique:activities,name," . $act->id,

        ]);

        $act->fill($request->only("name"));

        if($request->hasFile('image')){

            Storage::disk('images')->delete('images/'.$act->image);
            $act->image=$request->file('image')->storeAs('',uniqid()."-"-$request->file('image')->getClientOriginalName(), 'images');

        }

        $act->save();
        return redirect(route("activitie.index"))->with("success", __("¡Actividad actualizada con éxito!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Activitie $act)
    {
        $act->delete();
        return back()->with("success", __("¡Actividad eliminada con éxito!"));
    }
}
