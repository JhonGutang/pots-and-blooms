<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    private $customerRepo;
    
    public function __construct(CustomerRepository $customerRepository) {
        $this->customerRepo = $customerRepository;
    }

    public function index() {
        $customers = Customer::all();
        return response()->json(['data' => $customers]);
    }

    public function create (PostCustomerRequest $request) {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $customer = Customer::create($validated);

        return response()->json([
            "message" => 'Created Successfully',
            "data" => $customer,
        ]);
    }

    public function login(Request $request){

        $customer = $this->customerRepo->getCustomerByUsernameOrEmail($request->usernameOrEmail);

        if (!$customer || !Hash::check($request->password, $customer->password)) {
            return response()->json(['message' => 'Invalid Credentials'], status: 401);
        }

        $token = $customer->createToken('auth_token')->plainTextToken;

        return response()->json(['message' => "Valid Credentials, Welcome {$customer->full_name}",
                                        'token' => $token], 200);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer) {
        $validated = $request->validated();

        $customer->update($validated);
        return response()->json(['data' => $customer->fresh()]);
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return response()->json(['message' => 'Deleted Succesfully'], 200);
        
    }
}
