<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'contact_number'=>'required|integer',
            // 'facility_picture'=>'nullable|mimes:jpg,png',
            // 'valid_id'=>'nullable|mimes:jpg,png',
            'email'=>'required|unique:users',
            'password'=>'required|min:8'

        ];
    }
}
