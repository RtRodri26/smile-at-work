<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        // Obtener o crear el perfil del usuario
        $profile = $user->profile ?? Profile::create(['user_id' => $user->id]);
        
        // Obtener estadísticas del usuario
        $stats = [
            'total_services' => $user->companyServices()->count() + 
                              $user->universityServices()->count() + 
                              $user->eventServices()->count(),
            'pending_services' => $user->companyServices()->where('estado', 'Pendiente')->count() +
                                $user->universityServices()->where('estado', 'Pendiente')->count() +
                                $user->eventServices()->where('estado', 'Pendiente')->count(),
            'completed_services' => $user->companyServices()->where('estado', 'Completada')->count() +
                                  $user->universityServices()->where('estado', 'Completada')->count() +
                                  $user->eventServices()->where('estado', 'Completada')->count(),
        ];

        return view('profile.show', compact('user', 'profile', 'stats'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $profile = $user->profile ?? Profile::create(['user_id' => $user->id]);

        try {
            // Eliminar foto anterior si existe
            if ($profile->profile_photo && Storage::disk('public')->exists($profile->profile_photo)) {
                Storage::disk('public')->delete($profile->profile_photo);
            }

            // Guardar nueva foto
            $photoPath = $request->file('profile_photo')->store('profile-photos', 'public');
            
            // Actualizar perfil
            $profile->update([
                'profile_photo' => $photoPath,
            ]);

            return back()->with('success', 'Foto de perfil actualizada correctamente.');

        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar la foto: ' . $e->getMessage());
        }
    }

    public function removePhoto()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if ($profile && $profile->profile_photo) {
            try {
                // Eliminar archivo físico
                if (Storage::disk('public')->exists($profile->profile_photo)) {
                    Storage::disk('public')->delete($profile->profile_photo);
                }

                // Actualizar base de datos
                $profile->update([
                    'profile_photo' => null,
                ]);

                return back()->with('success', 'Foto de perfil eliminada correctamente.');

            } catch (\Exception $e) {
                return back()->with('error', 'Error al eliminar la foto: ' . $e->getMessage());
            }
        }

        return back()->with('error', 'No hay foto de perfil para eliminar.');
    }
}