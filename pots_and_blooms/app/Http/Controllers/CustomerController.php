<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    

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
        $message = null;
        $customer = Customer::where('email', $request->usernameOrEmail)
                                ->orWhere('full_name', $request->usernameOrEmail )
                                ->first();


        if (!$customer || !Hash::check($request->password, $customer->password)) {
            return response()->json(['Message' => 'Invalid Credentials'], status: 401);
        }

        $token = $customer->createToken('auth_token')->plainTextToken;

        $message = "Valid Credentials, Welcome {$customer->full_name}";

        return response()->json(['Result' => $message, 'token' => $token], 200);
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
