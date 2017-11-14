<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'Education';
    protected $primaryKey = 'EducationID';
    public $timestamps = true;
}
