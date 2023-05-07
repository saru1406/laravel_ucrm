<?php

namespace App\Http\Services;

use App\Http\Services\ItemServiceInterface;
use App\Http\Repositories\ItemRepositoryInterface;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class ItemService implements ItemServiceInterface
{
    public function __construct(private ItemRepositoryInterface $itemRepository)
    {
    }

    /**
     * {{@inheritDoc}}
     *
     * @return Collection
     */
    public function getItemSelect():Collection
    {
        $items = $this->itemRepository->getItemSelect();

        $item = new Item();
        
        return $item->isSelling($items);
    }

    public function createItem(
        $getName,
        $getMemo,
        $getPrice,
    ){
        $this->itemRepository->createItem(
            $getName,
            $getMemo,
            $getPrice,
        );
    }

    public function updateItem(
        $itemId,
        $getName,
        $getMemo,
        $getPrice,
        $getIsSelling,
    ){
        $this->itemRepository->updateItem(
            $itemId,
            $getName,
            $getMemo,
            $getPrice,
            $getIsSelling,
        );
    }

    public function deleteItem($itemId)
    {
        $this->itemRepository->deleteItem($itemId);
    }
}