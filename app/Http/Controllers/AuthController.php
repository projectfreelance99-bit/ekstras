<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if(Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            }
            if(Auth::user()->user_type == 2) {
                return redirect('siswa/dashboard');
            }
            if(Auth::user()->user_type == 3) {
                return redirect('pembina/dashboard');
            }
            if(Auth::user()->user_type == 4) {
                return redirect('kasekolah/dashboard');
            }
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $remember = $request->has('remember');
        
        // Cek apakah user ada
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password yang Anda masukkan salah');
        }

        // Coba login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            }
            if (Auth::user()->user_type == 2) {
                return redirect('siswa/dashboard');
            }
            if (Auth::user()->user_type == 3) {
                return redirect('pembina/dashboard');
            }
            if (Auth::user()->user_type == 4) {
                return redirect('kasekolah/dashboard');
            }
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function AuthRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|integer'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->save();

        return redirect('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();

            // Kirim email reset password
            Mail::send('emails.forgot_password', ['user' => $user], function($message) use($user){
                $message->to($user->email);
                $message->subject('Reset Password');
            });

            return redirect()->back()->with('success', 'Link reset password telah dikirim ke email Anda');
        }

        return redirect()->back()->with('error', 'Email tidak ditemukan');
    }

    public function reset($remember_token)
    {
        $user = User::where('remember_token', $remember_token)->first();
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        abort(404);
    }

    public function PostReset($token, Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('remember_token', $token)->first();
        if (!empty($user)) {
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect('login')->with('success', 'Password berhasil diubah');
        }
        abort(404);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
