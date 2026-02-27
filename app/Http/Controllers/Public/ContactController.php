<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\StoreContactRequest;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('public.contact');
    }

    public function store(StoreContactRequest $request)
    {
        Enquiry::create($request->validated());
        return redirect()->route('contact')->with('success', 'Message sent successfully.');
    }
}