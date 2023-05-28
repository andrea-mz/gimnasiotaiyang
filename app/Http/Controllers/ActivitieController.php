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

        return view("activities.index");
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
            "name" => "required|max:140|unique:groups",
            "imagen"=>"required|image|mimes:jpg,gif,png,jpeg|"

        ]);
        /*$group = Group::make(
            $request->only("name")
        );
        $group->save();*/
        Group::create(

            array_merge(

                $request->only("name"),[

                    //"imagen"=>$request->file('imagen')->store('','images')
                    "imagen"=>$file->storeAs('',uniqid()."-".$file->getClientOriginalName(),'images')

                ]

            )

        );

        return redirect(route("groups.index"))
            ->with("success", __("¡Grupo añadido con éxito!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Group $group)
    {
        $update = true;
        $title = __("Editar grupo");
        $textButton = __("Actualizar");
        $route = route("groups.update", ["group" => $group]);
        return view("groups.edit", compact("update", "title", "textButton", "route", "group"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, [

            "name" => "required|unique:groups,name," . $group->id,

        ]);

        $group->fill($request->only("name"));

        if($request->hasFile('imagen')){

            Storage::disk('images')->delete('images/'.$group->imagen);
            //$group->imagen=$request->file('imagen')->store('','images');
            $group->imagen=$request->file('imagen')->storeAs('',uniqid()."-"-$request->file('imagen')->getClientOriginalName(), 'images');

        }

        $group->save();
        return redirect(route("groups.index"))->with("success", __("¡Grupo actualizado con éxito!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return back()->with("success", __("¡Grupo eliminado con éxito!"));
    }
}
