<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['fabricante', 'modelo', 'ano', 'foto', 'status', 'id_adm'];
}
