<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return Redirect::intended(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return Redirect::back()->with('status', 'Verification link sent.');
    }
}
