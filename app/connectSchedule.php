<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class connectSchedule extends Model
{
    protected $table = 'connectschedule';
    protected $primaryKey = 'connectScheduleID';
    public $timestamps = true;
}
