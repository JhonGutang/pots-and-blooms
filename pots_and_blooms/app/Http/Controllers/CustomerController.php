<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService) {
        $this->customerService = $customerService;
    }
     public function index() {
        $customers = Customer::select('full_name', 'email')->get();
        return response()->json(['data' => $customers]);
    }

    public function store (PostCustomerRequest $request) {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $customer = Customer::create($validated);

        return response()->json([
            "message" => 'Created Successfully',
            "data" => $customer,
        ]);
    }

    public function login(Request $request){
        $userData = $this->customerService->attemptLogin($request);
        return response()->json(['message' => "Valid Credentials, Welcome {$userData['data']->full_name}",
                                        'token' => $userData['token']], 200);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer) {
        $validated = $request->validated();
        try {
            $customer->update($validated);
            return response()->json(['data' => $customer->fresh()]);
        } catch(Exception $error) {
            return response()->json(['message' => "Update Failed " . $error->getMessage() ], 500);
        }
    }

    public function destroy(Customer $customer) {
        try {
            $customer->delete();
            return response()->json(['message' => 'Deleted Succesfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => "Deletion Failed " . $error->getMessage() ], 500);
        }
        
    }
}
