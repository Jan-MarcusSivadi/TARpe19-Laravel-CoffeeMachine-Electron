<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeMachine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // täidetavad väljad
        'jooginimi',
        'topsepakis',
        'topsejuua',
    ];

    protected $attributes = [
        // vaikimisi väljad
        'topsepakis' => 50,
        'topsejuua' => 0,
    ];

    // tee võimalikuks kasutada ajaga seotud atribuute
    public $timestamps = true;
}
