<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    public function forgot()
    {
        return view('pages.backend.admin.auth.forgot-password');
    }
    
public function handleForgot(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'We couldn’t find an account with that email.']);
    }

    $token = $user->generateResetPasswordToken();

    $to = $user->email;
    $subject = "Reset Your Password";
    $resetUrl = url('/reset-password?email=' . urlencode($user->email) . '&token=' . urlencode($token));

    $message = '
    <html>
    <head>
        <title>Reset Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container p-4">
            <div class="card">
                <div class="card-body">
                    <h2>Password Reset Request</h2>
                    <p>We received a request to reset your password.</p>
                    <a href="' . $resetUrl . '" class="btn btn-primary">
                        Reset Your Password
                    </a>
                    <p>If you did not request this, please ignore this email.</p>
                </div>
            </div>
        </div>
    </body>
    </html>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Tinotenda Mangadza <no-reply@codewand.co.zw>' . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        return back()->with('success', 'Password reset email sent. Please check your inbox.');
    } else {
        return back()->with('error', 'Failed to send reset email. Please try again later.');
    }
}

}
