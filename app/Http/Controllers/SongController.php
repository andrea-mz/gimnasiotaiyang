<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->name=='andrea') 
            $songs=Song::paginate(10);
        else
            $songs=Auth::user()->songs()->paginate(10);
        return view("songs.index", compact("songs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $group=Group::all();
        $song = new Song;
        $title = __("Añadir canción");
        $textButton = __("Añadir");
        $route = route("songs.store");
        return view("songs.create", compact("title", "textButton", "route", "song", "group"));
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
            "name" => "required",
        ]);

        $song = Song::make(
            $request->only("name"),
        );
        $song->user_id=Auth::user()->id;
        $song->group_id=$request->input('group_id'); 
        $song->save();

        return redirect(route("songs.index"))
            ->with("success", __("¡Canción añadida con éxito!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Song $song)
    {
        $group=Group::all();
        $update = true;
        $title = __("Editar canción");
        $textButton = __("Actualizar");
        $route = route("songs.update", ["song" => $song]);
        return view("songs.edit", compact("update", "title", "textButton", "route", "song", "group"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Song $song)
    {
        $this->validate($request, [
            "name" => "required",
        ]);
        $song->group_id=$request->input('group_id'); 
        $song->fill($request->only("name"))->save();
        return redirect(route("songs.index"))->with("success", __("¡Canción actualizada con éxito!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return back()->with("success", __("¡Canción eliminada con éxito!"));
    }
}
