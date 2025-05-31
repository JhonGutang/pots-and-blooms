<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    protected $customerRepo;
    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }
    public function attemptLogin($userCredentials)
    {
        $customer = $this->customerRepo->getCustomerByUsernameOrEmail($userCredentials->usernameOrEmail);

        if (!$customer || !Hash::check($userCredentials->password, $customer->password)) {
            return response()->json(['message' => 'Invalid Credentials'], status: 401);
        }

        $token = $customer->createToken('auth_token')->plainTextToken;

        return [
            "success" => true,
            "data" => $customer,
            'token' => $token,
        ];
    }
}


?>