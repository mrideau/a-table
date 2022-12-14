<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\ContactValidationEmail;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Affichage de la page contact
     */
    public function show() {
        return view('contact');
    }

    /**
     * Envoie des emails
     */
    function contact(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        $data = [
            'first_name' => $request->first_name,
            'message' => $request->message,
            'email' => $request->email,
            'subject' => $request->subject,
        ];

        Mail::to($request->email)->send(new ContactValidationEmail($data));
        Mail::to('matis.rideau@hotmail.com')->send(new ContactEmail($data));

        return back()->with('message', __('contact.email_sent'));
    }
}
