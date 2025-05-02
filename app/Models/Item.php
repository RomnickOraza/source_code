<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_description',
        'unit_of_measure', // Make sure this is in your $fillable array if you added it
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function issuances()
    {
        return $this->hasMany(Issuance::class);
    }
}