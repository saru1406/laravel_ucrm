<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Services\ItemServiceInterface;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function __construct(private ItemServiceInterface $itemService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->itemService->getItemSelect();

        return Inertia::render('Items/Index',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Items/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $this->itemService->createItem(
            $request->getName(),
            $request->getMemo(),
            $request->getPrice(),
        );
        
        return to_route('items.index')->with(['message' => '登録しました。']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return Inertia::render('Items/Show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return Inertia::render('Items/Edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $this->itemService->updateItem(
            $item->id,
            $request->getName(),
            $request->getMemo(),
            $request->getPrice(),
            $request->getIsSelling(),
        );

        return to_route('items.index')->with(['message' => '変更しました。']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->itemService->deleteItem(
            $item->id,
        );

        return to_route('items.index')->with(['message' => '削除しました。']);
    }
}
