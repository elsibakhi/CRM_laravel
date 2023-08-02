<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable','string', 'max:255'],
            'email' => ['nullable','email', 'max:255'],
         
 
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'cover_path' => ['nullable',"image"],
            'city' => ['nullable',"string"],
            'cv' => ['nullable',"string"],
        ];
    }
}
