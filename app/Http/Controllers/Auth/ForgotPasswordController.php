<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        Password::sendResetLink(
            $request->only('email'),
            function ($user, string $token) {
                $user->sendPasswordResetNotification($token);

                // Confort de test UNIQUEMENT en environnement local (APP_ENV=local) :
                // affiche le lien à l'écran, car les e-mails sont écrits dans les logs.
                if (app()->isLocal()) {
                    session()->flash('dev_reset_link', route('password.reset', [
                        'token' => $token,
                        'email' => $user->email,
                    ]));
                }
            }
        );

        // Message volontairement identique que le compte existe ou non.
        return back()->with('status', "Si un compte correspond à cette adresse, un lien de réinitialisation vient d'être envoyé.");
    }
}