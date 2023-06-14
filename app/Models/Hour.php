<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hour extends Model
{

    use HasFactory;

    protected $fillable=['act_id', 'day_of_the_week', 'hour', 'reserved_places', 'available_places'];

    public function reservations() {

        return $this->hasMany(Reservation::class);

    }

    public function activity() {

        return $this->belongsTo(Activity::class);

    }

    public static function get_hours_by_act($activity) {

        return DB::table('hours')->where('act_id', $activity)->get();

    }

    public static function get_act_by_id($id) {

        return DB::table('hours')->where('id', $id)->get();

    }

    public static function add_reserved_place($id) {

        return DB::table('hours')->where('id', $id)->increment('reserved_places', 1);

    }

    public static function delete_reserved_place($id) {

        return DB::table('hours')->where('id', $id)->decrement('reserved_places', 1); 

    }

}
