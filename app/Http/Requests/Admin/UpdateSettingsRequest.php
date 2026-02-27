<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can update settings
    }

    public function rules()
    {
        return [
            'site_name' => ['required', 'string', 'max:255'],
            'site_description' => ['required', 'string'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:20'],
        ];
    }
}