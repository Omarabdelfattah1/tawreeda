<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'company_name' => ['required', 'min:3'],
        'state' => ['required'],
        'company_address' => ['required'],
        'about' => ['required'],
        'name' => ['required', 'string', 'max:255'],
        'mobile' => ['required','string', 'max:255', 'unique:users,mobile'],
        'email' => ['nullable','string', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8','confirmed'],
        'password_confirmation' => ['required'],
            ];
    }
}
