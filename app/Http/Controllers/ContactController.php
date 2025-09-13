<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        try {
            // 1. Validate the form data.
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'email'      => 'required|string|email|max:255',
                'company'    => 'nullable|string|max:255',
                'message'    => 'required|string|max:2000',
            ]);

            Mail::to('testrambahadur@gmail.com')->send(new ContactMail($validatedData));

            Log::info('Contact form submitted successfully.', $validatedData);
            return back()->with('status', ['type' => 'success', 'message' => 'Thank you for your message! We will get back to you soon.']);
        } catch (ValidationException $e) {
            Log::warning('Validation failed for contact form submission.', [
                'errors' => $e->errors(),
                'request' => $request->all(),
            ]);
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Failed to send contact form email.', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);
            return back()->with('status', ['type' => 'error', 'message' => 'Sorry, something went wrong. Please try again later.']);
        }
    }
}
