<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'Family';
    protected $primaryKey = 'FamilyID';
    public $timestamps = true;
}
