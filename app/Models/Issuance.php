<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuance extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'office',
        'qty_issued',
        'balance_qty',
        // Consider adding 'unit_cost_at_issuance' if you want to track cost at the time of issue
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'item_id', 'item_id');
    }
}