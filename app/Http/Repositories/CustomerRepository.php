<?php

namespace App\Http\Repositories;

use App\Models\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * {{@inheritDoc}}
     *
     * @return
     */
    public function getCustomerAll()
    {
        return Customer::paginate(10);
    }
}