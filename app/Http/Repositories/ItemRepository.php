<?php

namespace App\Http\Repositories;

use App\Models\Item;
use App\Http\Repositories\ItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ItemRepository implements ItemRepositoryInterface
{
    /**
     * {{@inheritDoc}}
     *
     * @return Collection
     */
    public function getItemSelect():Collection
    {
        return Item::select('id', 'name', 'price', 'is_selling')->get();
    }

    public function createItem(
        $getName,
        $getMemo,
        $getPrice,
    ){
        Item::create([
            'name' => $getName,
            'memo' => $getMemo,
            'price' => $getPrice,
        ]);
    }
}