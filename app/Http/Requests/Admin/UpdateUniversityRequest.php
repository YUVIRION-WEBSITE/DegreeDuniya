<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversityRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can update universities
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:universities,name,' . $this->university->id],
            'description' => ['required', 'string'],
            'vision' => ['required', 'string'],
            'mission' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:government,private'],
        ];
    }
}