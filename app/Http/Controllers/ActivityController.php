<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ActivityController extends Controller
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
        $activities=Activity::paginate(10);

        return view("activities.index", compact("activities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $activity = new Activity;
        $title = __("Crear actividad");
        $textButton = __("Crear");
        $route = route("activities.store");
        //dd($route);
        return view("activities.create", compact("title", "textButton", "route", "activity"));
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
            "shortname" => "required|max:3|unique:activities",
            "name" => "required|max:140|unique:activities",
            "image" => "required",

        ]);
       // $user=Auth::user()->id;
      //  dd($user);
        $activity = Activity::make(
            $request->only("shortname","name", "image")
        );
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect(route("activities.index"))
            ->with("success", __("¡Actividad creada correctamente!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Activity $activity)
    {
        $update = true;
        $title = __("Editar actividad");
        $textButton = __("Actualizar");
        $route = route("activities.update", ["activity" => $activity]);
        return view("activities.edit", compact("update", "title", "textButton", "route", "activity"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Activity $activity)
    {
        $this->validate($request, [
            "shortname" => "required|max:3",
            "name" => "required|unique:activities,name," . $activity->id,
        ]);

        $activity->fill($request->only("shortname","name"))->save();
        return back()->with("success", __("¡Actividad actualizada correctamente!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return back()->with("success", __("¡Actividad eliminada correctamente!"));
    }
}
