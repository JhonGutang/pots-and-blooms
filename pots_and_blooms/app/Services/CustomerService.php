<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    protected $customerRepo;
    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function getCustomers()
    {
        return Customer::select('full_name', 'email')->get();
    }

    public function createCustomer(array $validateData)
    {
        $validateData['password'] = Hash::make($validateData['password']);
        $customer = Customer::create($validateData);

        return $customer;
    }

    public function updateCustomer($validatedData, Customer $customer)
    {
        $customer->update($validatedData);
    }

    public function destroyCustomer(Customer $customer)
    {
        $customer->delete();

    }

}


?>