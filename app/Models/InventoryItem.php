<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $fillable = [
        'inventory_document_id', 
        'category_id', 
        'item_title', 
        'description', 
        'unit', 
        'qty', 
        'serial_no', 
        'inventory_item_no', 
        'property_no',
        'acquired_date',
        'disposal_date',
        'estimated_life', 
        'unit_cost',
        'total_cost',
        'status',
    ];

    protected $casts = [
        'acquired_date' => 'date',
        'disposal_date' => 'date',
        'unit_cost' => 'decimal:2',
        'total_cost' => 'decimal:2',
    ];

    public function inventoryDocument()
    {
        return $this->belongsTo(InventoryDocument::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
