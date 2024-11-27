<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Exibir formulário de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function showLoginForm()
{
    return view('auth.login');
}

    // Processar registro
    public function register(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:Aluno,Empresa', // Restringe os papéis ao esperado
        ]);
    
        // Criar o usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    
        // Fazer login automático após o registro
        Auth::login($user);
    
        // Redirecionar com base no papel
        if ($user->role === 'Empresa') {
            return redirect()->route('empresa.dashboard');
        } elseif ($user->role === 'Aluno') {
            return redirect()->route('aluno.dashboard');
        }
    }

    // Exibir formulário de login
   

    // Processar login
    public function login(Request $request)
    {
        // Validação dos campos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Tentar autenticar
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirecionar com base no papel
            if (auth()->user()->role === 'Empresa') {
                return redirect()->route('empresa.dashboard');
            } elseif (auth()->user()->role === 'Aluno') {
                return redirect()->route('aluno.dashboard');
            }
        }
    
        // Retornar erro em caso de falha
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->onlyInput('email');
    }

    // Processar logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}