<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hour extends Model
{

    use HasFactory;

    protected $fillable=['name'];

    public function reservations() {

        return $this->hasMany(Reservation::class);

    }

    public function activity() {

        return $this->belongsTo(Activity::class);

    }

    public static function get_hours_by_act($activity) {

        return DB::table('hours')->where('act_id', $activity)->orderBy('day_of_the_week', 'asc')->get();

    }

}
