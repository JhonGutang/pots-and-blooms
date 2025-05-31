<?php
namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Contracts\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface {

    public function getCustomerByUsernameOrEmail($usernameOrEmail) {
              return Customer::where('email', $usernameOrEmail)
                                ->orWhere('full_name', $usernameOrEmail )
                                ->first();
    }
 }

?>