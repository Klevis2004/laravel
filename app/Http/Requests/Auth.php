<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Auth extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'min:2|max:50',
            'surname' => 'min:2|max:50',
            'password' => 'min:8',
            're-password' => 'same:password',
        ];
    }
}
