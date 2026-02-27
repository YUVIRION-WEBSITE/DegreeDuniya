<?php

namespace App\Http\Requests\Public;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to submit enquiries
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'university_id' => ['required', 'exists:universities,id'],
            'college_id' => ['nullable', 'exists:colleges,id'],
            'course_id' => ['nullable', 'exists:courses,id'],
            'message' => ['required', 'string'],
        ];
    }
}