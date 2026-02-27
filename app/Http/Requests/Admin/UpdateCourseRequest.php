<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can update courses
    }

    public function rules()
    {
        return [
            'university_id' => ['required', 'exists:universities,id'],
            'college_id' => ['required', 'exists:colleges,id'],
            'name' => ['required', 'string', 'max:255', 'unique:courses,name,' . $this->course->id],
            'description' => ['required', 'string'],
            'duration' => ['required', 'string', 'max:100'],
            'fees' => ['required', 'numeric', 'min:0'],
            'eligibility' => ['required', 'string'],
            'scope' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}