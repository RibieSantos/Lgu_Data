<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'department_name',
        'department_code',
        'description',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }
}
