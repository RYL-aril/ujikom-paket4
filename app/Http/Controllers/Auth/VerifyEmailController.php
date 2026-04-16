<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            $dashboardRoute = match($request->user()->role) {
                'anggota' => route('anggota.dashboard', absolute: false),
                'admin', 'petugas' => route('admin.dashboard', absolute: false),
                default => route('anggota.dashboard', absolute: false),
            };
            return redirect()->intended($dashboardRoute.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $dashboardRoute = match($request->user()->role) {
            'anggota' => route('anggota.dashboard', absolute: false),
            'admin', 'petugas' => route('admin.dashboard', absolute: false),
            default => route('anggota.dashboard', absolute: false),
        };

        return redirect()->intended($dashboardRoute.'?verified=1');
    }
}
