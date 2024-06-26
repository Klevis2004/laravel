<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsBlog extends FormRequest
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
            'name' => 'required|min:5|max:50',
            'author' => 'required|min:5',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
            'price' =>'required',
            'rent_price' => 'required',
            'sasia' =>'required',
            'summary' => 'required',
        ];
    }
}
