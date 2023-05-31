<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ReservationController extends Controller
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
            $reservations=Reservation::paginate(10);
        else
            $reservations=Auth::user()->reservations()->paginate(10);
        return view("reservations.index", compact("reservations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($act)
    {
        $activities=Activitie::all();
        $reservation = new Reservation;
        $title = __("Añadir reserva");
        $textButton = __("Añadir");
        $route = route("reservations.store");
        return view("reservations.create", compact("title", "textButton", "route", "reservation", "activities"));
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

        return redirect(route("reservations.index"))
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
        $route = route("reservations.update", ["song" => $song]);
        return view("reservations.edit", compact("update", "title", "textButton", "route", "song", "group"));
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
        return redirect(route("soreservationsngs.index"))->with("success", __("¡Canción actualizada con éxito!"));
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
