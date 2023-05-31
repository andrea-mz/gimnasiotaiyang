<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model

{

    use HasFactory;

    protected $fillable=['name'];

    public function hours() {

        return $this->hasMany(Hour::class);

    }

    // function get_activities() {

    //     $activities=DB::select('SELECT * FROM ')

    // }

}