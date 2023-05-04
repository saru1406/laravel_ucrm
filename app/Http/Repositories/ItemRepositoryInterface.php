<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ItemRepositoryInterface
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
}
