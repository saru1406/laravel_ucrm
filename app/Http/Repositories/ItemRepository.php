<?php

namespace App\Http\Repositories;

use App\Models\Item;
use App\Http\Repositories\ItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Inertia\Inertia;

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

    public function updateItem(
        $itemId,
        $getName,
        $getMemo,
        $getPrice,
        $getIsSelling,
    ){
        Item::where('id', $itemId)->update([
            'name' => $getName,
            'memo' => $getMemo,
            'price' => $getPrice,
            'is_selling' => $getIsSelling,
        ]);
    }

    public function deleteItem($itemId)
    {
        Item::where('id', $itemId)->delete();
    }
}