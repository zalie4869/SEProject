<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'scheduleID';
    public $timestamps = true;
}
