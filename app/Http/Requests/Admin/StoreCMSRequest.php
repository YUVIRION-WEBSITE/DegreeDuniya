<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCMSRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can create CMS content
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:cms,title'],
            'content' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:255', 'unique:cms,slug'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}