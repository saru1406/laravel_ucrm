<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'memo',
        'price',
        'is_selling'
    ];

    public function isSelling($items)
    {
        foreach ( $items as $item ) {
            if ( $item->is_selling === 1 ) {
                $item->is_selling = "販売中";
            } elseif ( $item->is_selling === 2 ) {
                $item->is_selling = "販売中止";
            }
        }
        return $items;
    }
}
