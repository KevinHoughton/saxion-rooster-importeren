<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooster extends Model
{
    const GROUP = 'class';
    const TEACHER = 'teacher';

    protected $table = 'roosters';
    protected $fillable = ['name', 'ical', 'type'];
}
