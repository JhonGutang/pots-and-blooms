<?php

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows list of customers in /customer api', function () {
    $response = $this->get(route('customers.index'));
    $response->assertStatus(200);
});


it('creates Customer Account', function() {
    $response = $this->postJson(route('customers.store'), [
        'full_name' => 'John Doe',
        'email' => 'johndoe@gmail.com',
        'address' => 'fake address',
        'phone_number' => '+63998123771',
        'password' => 'fakepassword',
        'password_confirmation' => 'fakepassword'
    ]);

      $response->assertStatus(200);
});

it('updates a customer successfully with factory', function () {
    $customer = Customer::factory()->create();
    $updateData = [
        'full_name' => 'Updated Name',
        'email' => 'updated@example.com',
        'address' => '123 Updated Street',
        'phone_number' => '555-1234'
    ];

    $response = $this->putJson(route('customers.update', $customer), $updateData);

    $response->assertStatus(200);

    $this->assertDatabaseHas('customers', [
        'id' => $customer->id,
        'full_name' => 'Updated Name',
        'email' => 'updated@example.com',
    ]);
});


it('deletes a customer successfully via API', function () {
    $customer = Customer::factory()->create();
    $response = $this->deleteJson(route('customers.destroy', $customer));
    $response->assertStatus(200)
             ->assertJson([
                 'message' => 'Deleted Succesfully',
             ]);

    $this->assertDatabaseMissing('customers', [
        'id' => $customer->id,
    ]);
});