<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCMSRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Only authenticated admins can update CMS content
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:cms,title,' . $this->cm->id],
            'content' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:255', 'unique:cms,slug,' . $this->cm->id],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}