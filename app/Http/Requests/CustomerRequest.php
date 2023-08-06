<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'membership_number' => 'required|integer',
            'name' => 'required|string|max:50',
            'sex' => 'required',
            'birth_year' => 'required|integer|digits:4',
            'birth_month' => 'required|integer|digits_between:1,2',
            'birth_day' => 'required|integer|digits_between:1,2',
            'zip' => 'required|integer|digits:4',
            'address' => 'required|string',
            'tel' => 'required|string|max:13'
        ];
    }
}
