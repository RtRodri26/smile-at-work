<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyService;
use App\Models\UniversityService;
use App\Models\EventService;
use App\Models\JobApplication;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();
    
    $stats = [
        'total_services' => $user->companyServices()->count() + 
                          $user->universityServices()->count() + 
                          $user->eventServices()->count(),
        
        'pending_services' => $user->companyServices()->where('estado', 'Pendiente')->count() +
                            $user->universityServices()->where('estado', 'Pendiente')->count() +
                            $user->eventServices()->where('estado', 'Pendiente')->count(),
        
        'active_applications' => $user->jobApplications()->whereIn('estado', ['Pendiente', 'Entrevista'])->count(),
        
        'completed_services' => $user->companyServices()->where('estado', 'Completada')->count() +
                              $user->universityServices()->where('estado', 'Completada')->count() +
                              $user->eventServices()->where('estado', 'Completada')->count(),
    ];

    // Conteo por estado para el gráfico
    $statusCounts = [
        'Pendiente' => $user->companyServices()->where('estado', 'Pendiente')->count() +
                       $user->universityServices()->where('estado', 'Pendiente')->count() +
                       $user->eventServices()->where('estado', 'Pendiente')->count(),
        'Aceptada' => $user->companyServices()->where('estado', 'Aceptada')->count() +
                      $user->universityServices()->where('estado', 'Aceptada')->count() +
                      $user->eventServices()->where('estado', 'Aceptada')->count(),
        'Rechazada' => $user->companyServices()->where('estado', 'Rechazada')->count() +
                       $user->universityServices()->where('estado', 'Rechazada')->count() +
                       $user->eventServices()->where('estado', 'Rechazada')->count(),
        'Completada' => $user->companyServices()->where('estado', 'Completada')->count() +
                        $user->universityServices()->where('estado', 'Completada')->count() +
                        $user->eventServices()->where('estado', 'Completada')->count(),
    ];

    // Obtener solicitudes recientes (últimas 5)
    $recentRequests = collect();
    
    $companyServices = $user->companyServices()->latest()->take(3)->get()->map(function($item) {
        $item->type = 'Empresa';
        $item->icon = 'fas fa-building';
        $item->color = 'blue';
        return $item;
    });

    $universityServices = $user->universityServices()->latest()->take(3)->get()->map(function($item) {
        $item->type = 'Universidad';
        $item->icon = 'fas fa-university';
        $item->color = 'green';
        return $item;
    });

    $eventServices = $user->eventServices()->latest()->take(3)->get()->map(function($item) {
        $item->type = 'Evento';
        $item->icon = 'fas fa-calendar-check';
        $item->color = 'purple';
        return $item;
    });

    $recentRequests = $recentRequests->concat($companyServices)
        ->concat($universityServices)
        ->concat($eventServices)
        ->sortByDesc('created_at')
        ->take(5);

    $welcome_message = $this->getWelcomeMessage();

    return view('dashboard', compact('user', 'stats', 'welcome_message', 'statusCounts', 'recentRequests'));
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