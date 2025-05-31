<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\PrepareSnakeCase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostCustomerRequest extends FormRequest
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
            "full_name" => 'required|string|min:3',
            "email" => 'required|email|unique:customers,email',
            "address" => 'required|string',
            "phone_number" => 'required|string',
            "password" => 'required|string|confirmed',
        ];
    }
}
