<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'item_title',
        'employee_id',
        'ics_no',
        'qty',
        'description',
        'serial_no',
        'acquired_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
