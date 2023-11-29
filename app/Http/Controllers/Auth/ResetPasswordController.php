<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
//use App\Mail\ResetPasswordMail;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
//    public function index()
//    {
//        return view('password.reset');
//    }
//
//    public function sendEmail(Request $request)
//    {
//        $user = User::where('email', $request->input('email'))->first();
//        if (!$user) {
//            return back()->with('error', 'Email not found');
//        }
//        $token = rand(100000, 999999);
//        $user->password_reset_token = $token;
//        $user->save();
//        Mail::to($user->email)->send(new ResetPasswordMail($user));
//        return back()->with('success', 'Email sent');
//    }
//
//    public function resetPassword(Request $request, $token)
//    {
//        $user = User::where('password_reset_token', $token)->first();
//        if (!$user) {
//            return redirect()->route('password.request')->with('error', 'Invalid token');
//        }
//        $user->password = bcrypt($request->input('password'));
//        $user->password_reset_token = null;
//        $user->save();
//        return redirect()->route('login')->with('success', 'Password reset successfully');
//    }

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
