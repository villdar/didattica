<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Questa mail non può essere aggiunta alla nostra lista.'
            ]);
        }

        return redirect('/')
            ->with('success', 'Ottimo! Sei iscritto alla nostra Newsletter');
    }
}
