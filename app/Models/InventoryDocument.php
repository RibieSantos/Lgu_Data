<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryDocument extends Model
{
    protected $fillable = [
        'document_no',
        'accountable_person_id',
        'document_type',
        'fund',
        'document_date',
        'received_from_id',
        'received_by_id',
        'remarks',
    ];

    protected $casts = [
        'document_date' => 'date',
    ];

    public function accountablePerson()
    {
        return $this->belongsTo(Employee::class, 'accountable_person_id');
    }

    public function receivedFrom()
    {
        return $this->belongsTo(Employee::class, 'received_from_id');
    }

    public function receivedBy()
    {
        return $this->belongsTo(Employee::class, 'received_by_id');
    }

    public function items()
    {
        return $this->hasMany(InventoryItem::class);
    }
}
