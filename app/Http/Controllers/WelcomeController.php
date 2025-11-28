<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        return view('welcome-user', [
            'user' => $user,
            'welcome_message' => $this->getWelcomeMessage()
        ]);
    }

    private function getWelcomeMessage()
    {
        $hour = now()->hour;
        
        if ($hour < 12) {
            return "¡Buenos días! Esperamos que tengas un día maravilloso.";
        } elseif ($hour < 18) {
            return "¡Buenas tardes! Que tengas una tarde productiva.";
        } else {
            return "¡Buenas noches! Descansa y recarga energías.";
        }
    }
}