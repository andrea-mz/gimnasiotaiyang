<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model

{

    use HasFactory;

    protected $fillable=['name'];

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function hour() {

        return $this->belongsTo(Hour::class);

    }

    protected static function boot() {

        parent::boot();
        self::creating(function($table){
            if(!app()->runningInConsole()) {
                $table->user_id=auth()->id();
            }
        });

    }

}