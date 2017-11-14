<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
	use Searchable;
    protected $table = 'Employee';
    protected $primaryKey = 'EmpID';
    public $timestamps = true;
}
