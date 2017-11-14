<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDCard extends Model
{
    protected $table = 'IDCard';
    protected $primaryKey = 'CardID';
    public $timestamps = true;
}
