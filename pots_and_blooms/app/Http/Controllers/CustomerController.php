<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerAuthService;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    protected $customerAuthService;
    public function __construct(CustomerService $customerService, CustomerAuthService $customerAuthService) {
        $this->customerService = $customerService;
        $this->customerAuthService = $customerAuthService;
    }
     public function index() {
        $customers = $this->customerService->getCustomers();
        return response()->json(['data' => $customers]);
    }

    public function store (PostCustomerRequest $request) {
        $customer = $this->customerService->createCustomer($request->validated());
        return response()->json([
            "message" => 'Created Successfully',
            "data" => $customer,
        ]);
    }

    public function login(Request $request){
        $userData = $this->customerAuthService->attemptLogin($request);
        return response()->json(['message' => "Valid Credentials, Welcome {$userData['data']->full_name}",
                                        'token' => $userData['token']], 200);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer) {
        $validated = $request->validated();
        try {
            $this->customerService->updateCustomer($validated, $customer);
            return response()->json(['data' => $customer->fresh()]);
        } catch(Exception $error) {
            return response()->json(['message' => "Update Failed " . $error->getMessage() ], 500);
        }
    }

    public function destroy(Customer $customer) {
        try {
            $this->customerService->destroyCustomer($customer);
            return response()->json(['message' => 'Deleted Succesfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => "Deletion Failed " . $error->getMessage() ], 500);
        }
        
    }
}
