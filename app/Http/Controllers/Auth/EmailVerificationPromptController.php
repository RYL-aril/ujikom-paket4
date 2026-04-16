<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->hasVerifiedEmail()) {
            $dashboardRoute = match($request->user()->role) {
                'anggota' => route('anggota.dashboard', absolute: false),
                'admin', 'petugas' => route('admin.dashboard', absolute: false),
                default => route('anggota.dashboard', absolute: false),
            };
            return redirect()->intended($dashboardRoute);
        }
        return view('pages.auth.verify-email');
    }
}
