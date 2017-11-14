<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonNotify extends Model
{
    protected $table = 'PersonNotify';
    protected $primaryKey = 'PersonID';
    public $timestamps = true;
}
