<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Reservation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
        $reservations=Reservation::paginate(10);

        return view("reservations.index", compact("reservations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Activity $activity)
    {
        $hours = DB::table('hours')->where('act_id', $activity)->get();
        $reservation = new Reservation;
        $title = __("Crear Reserva");
        $textButton = __("Crear");
        $route = route("reservations.store");
        //dd($route);
        return view("reservations.create", compact("title", "textButton", "route", "reservation", "activity", "hours"));
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
            "user_id" => "required",
            "hour_id" => "required",

        ]);
       // $user=Auth::user()->id;
      //  dd($user);
        $reservation = Reservation::make(
            $request->only("user_id", "hour_id")
        );
        $reservation->user_id = Auth::user()->id;
        $reservation->save();

        return redirect(route("reservations.index"))
            ->with("success", __("¡Reserva creada correctamente!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Reservation $reservation)
    {
        $update = true;
        $title = __("Editar reserva");
        $textButton = __("Actualizar");
        $route = route("reservations.update", ["reservation" => $reservation]);
        return view("reservations.edit", compact("update", "title", "textButton", "route", "reservation"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Reservation $reservation)
    {
        $this->validate($request, [
            "user_id" => "required" . $project->id,
            "hour_id" => "required",
        ]);
        $reservation->fill($request->only("user_id", "hour_id"))->save();
        return back()->with("success", __("¡Reserva actualizada correctamente!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back()->with("success", __("¡Reserva eliminada correctamente!"));
    }
}
