<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Collection;

interface CustomerServiceInterface
{
    /**
     * アイテムのid,name,price,is_sellingを取得
     *
     * @return
     */
    public function getCustomerAll();
}
