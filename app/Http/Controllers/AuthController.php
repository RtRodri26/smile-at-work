<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ApiPeruService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $apiPeruService;

    public function __construct()
    {
        $this->apiPeruService = new ApiPeruService();
    }

    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Mostrar formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Validar DNI en tiempo real
    public function validarDNI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dni' => 'required|digits:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'DNI debe tener 8 dígitos']);
        }

        $result = $this->apiPeruService->consultarDNI($request->dni);

        if ($result['success']) {
            return response()->json($result);
        }

        return response()->json(['success' => false, 'message' => $result['message']]);
    }

    // Procesar registro
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dni' => 'required|digits:8|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Validar DNI con APIPeru
        $dniValidation = $this->apiPeruService->consultarDNI($request->dni);
        
        if (!$dniValidation['success']) {
            return back()->with('error', 'DNI no válido')->withInput();
        }

        // Crear usuario
        $user = User::create([
            'dni' => $request->dni,
            'nombres' => $dniValidation['data']['nombres'],
            'apellido_paterno' => $dniValidation['data']['apellido_paterno'],
            'apellido_materno' => $dniValidation['data']['apellido_materno'],
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        // CAMBIO: Redirigir a la página de bienvenida en lugar del dashboard
        return redirect()->route('dashboard')->with('success', '¡Registro exitoso!');
    }

    // Procesar login
 public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        // Cambia esta línea para redirigir a welcome
        return redirect()->route('dashboard')->with('success', '¡Bienvenido de vuelta!');
    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden.',
    ]);
}

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}