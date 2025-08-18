<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAuthController extends Controller
{
   
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->role === 'admin' || $user->is_admin) {
                \Log::info('Login: Admin logged in: ' . $user->email);
                return redirect()->route('admin.dashboard');
            }
    
            \Log::warning('Login: Non-admin user tried to access admin: ' . $user->email);
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['error' => 'You are not authorized to access this page.']);
        }
    
        \Log::error('Login: Invalid credentials for email: ' . $request->email);
        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }
    

    
}
