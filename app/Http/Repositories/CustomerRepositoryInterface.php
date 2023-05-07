<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CustomerRepositoryInterface
{
    /**
     * アイテムのid,name,price,is_sellingを取得
     *
     * @return 
     */
    public function getCustomerAll();
}
