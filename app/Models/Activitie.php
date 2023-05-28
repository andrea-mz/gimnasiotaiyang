<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitie extends Model

{

    use HasFactory;

    protected $fillable=['name'];

    function get_activities() {

        //$activities=DB::select('SELECT * FROM ')

    }

}
