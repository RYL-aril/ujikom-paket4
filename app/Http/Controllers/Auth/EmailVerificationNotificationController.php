<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            $dashboardRoute = match($request->user()->role) {
                'anggota' => route('anggota.dashboard', absolute: false),
                'admin', 'petugas' => route('admin.dashboard', absolute: false),
                default => route('anggota.dashboard', absolute: false),
            };
            return redirect()->intended($dashboardRoute);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
