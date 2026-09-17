<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'employee_number',
        'employee_image',
        'position_id',
        'position',
        'first_name',
        'last_name',
        'middle_name',
        'contact_number',
        'birth_date',
        'contact_person_name',
        'contact_person_number',
        'contact_person_address',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'employee_id');
    }

    public function inventoryDocuments()
    {
        return $this->hasMany(InventoryDocument::class, 'accountable_person_id');
    }
}
