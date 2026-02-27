<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUniversityRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can create universities
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:universities,name'],
            'description' => ['required', 'string'],
            'vision' => ['required', 'string'],
            'mission' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:government,private'],
        ];
    }
}