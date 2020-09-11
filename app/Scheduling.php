<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $fillable = ['data', 'hora', 'id_car', 'id_user'];
}
