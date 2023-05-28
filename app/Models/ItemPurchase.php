<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id ',
        'purchase_id',
        'quantity'
    ];
}
