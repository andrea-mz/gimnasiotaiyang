<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model

{

    use HasFactory;

    protected $fillable=['name'];

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function hours() {

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