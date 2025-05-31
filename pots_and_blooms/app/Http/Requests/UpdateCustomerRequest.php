<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\PrepareSnakeCase;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{

    use PrepareSnakeCase;

      /**
         * Determine if the user is authorized to make this request.
         */
    public function authorize(): bool
    {
        return true;
    }

     public function prepareForValidation()
    {
        $this->prepareSnakeCase();
    } 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "full_name" => 'sometimes|string|min:3',
            "email" => 'sometimes|email|unique:customers,email,' . $this->customer->id ,
            "address" => 'sometimes|string',
            "phone_number" => 'sometimes|string',
            "password" => 'sometimes|string|confirmed',
        ];
    }
}
