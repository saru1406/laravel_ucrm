<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Services\CustomerServiceInterface;
use App\Http\Requests\SearchCustomerRequest;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function __construct(private CustomerServiceInterface $customerService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SearchCustomerRequest $request)
    {
        $customers = Customer::customerSearch($request->getSearch())->paginate(10);

        return Inertia::render('Customers/Index',['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
