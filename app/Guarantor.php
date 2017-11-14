<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    protected $table = 'Guarantor';
    protected $primaryKey = 'GuarantorID';
    public $timestamps = true;
}
