<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\PrepareSnakeCase;
use Illuminate\Foundation\Http\FormRequest;

class PostFlowerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    use PrepareSnakeCase;

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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:255',
        ];
    }
}
