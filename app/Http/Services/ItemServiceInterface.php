<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Collection;

interface ItemServiceInterface
{
    /**
     * アイテムのid,name,price,is_sellingを取得
     *
     * @return Collection
     */
    public function getItemSelect():Collection;

    public function createItem(
        $getName,
        $getMemo,
        $getPrice,
    );

    public function updateItem(
        $itemId,
        $getName,
        $getMemo,
        $getPrice,
        $getIsSelling,
    );

    public function deleteItem($itemId);
}
