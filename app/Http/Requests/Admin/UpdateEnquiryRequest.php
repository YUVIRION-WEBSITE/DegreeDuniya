<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnquiryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can update enquiries
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'university_id' => ['required', 'exists:universities,id'],
            'message' => ['required', 'string'],
            'status' => ['required', 'in:pending,contacted,resolved'],
        ];
    }
}