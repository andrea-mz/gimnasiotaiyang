<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model

{

    use HasFactory;

    protected $fillable=['name'];

    public function hours() {

        return $this->hasMany(Hour::class);

    }

    public static function get_activity_by_id($id) {

        return DB::table('activities')->where('id', $id)->get();

    }

}