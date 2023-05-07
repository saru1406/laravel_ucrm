<?php

namespace App\Http\Services;

use App\Http\Services\CustomerServiceInterface;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class CustomerService implements CustomerServiceInterface
{
    public function __construct(private CustomerRepositoryInterface $customerRepository)
    {
    }

    /**
     * {{@inheritDoc}}
     *
     * @return 
     */
    public function getCustomerAll()
    {
        return $this->customerRepository->getCustomerAll();
    }
}