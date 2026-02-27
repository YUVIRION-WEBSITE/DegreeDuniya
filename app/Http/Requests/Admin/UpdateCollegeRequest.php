<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollegeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can update colleges
    }

    public function rules()
    {
        return [
            'university_id' => ['required', 'exists:universities,id'],
            'name' => ['required', 'string', 'max:255', 'unique:colleges,name,' . $this->college->id],
            'description' => ['required', 'string'],
            'tagline' => ['required', 'string', 'max:255'],
            'facilities' => ['nullable', 'array'],
            'facilities.*' => ['string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}