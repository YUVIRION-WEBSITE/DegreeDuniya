<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function index()
    {
        return view('admin.support.index');
    }

    public function store(StoreSupportRequest $request)
    {
        $data = $request->validated();
        // Simulate sending support ticket via email
        try {
            Mail::raw($data['message'], function ($message) use ($data) {
                $message->to(config('mail.support_address', 'support@example.com'))
                        ->subject('Support Request from ' . $data['name'])
                        ->from($data['email'], $data['name']);
            });
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Failed to send support request.']);
        }
        return redirect()->route('admin.support.index')->with('success', 'Support request sent successfully.');
    }
}