<?php

namespace App\Repositories\Contracts;

interface CustomerRepositoryInterface {

    public function findByEmailOrFullName ($usernameOrEmail);

}

?>