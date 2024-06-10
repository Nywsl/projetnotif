<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;



class ParametreController extends Controller
{
    public function indexGeneral()
    {
        // Récupérez les paramètres actuels pour la section générale
        $settings = [
            'site_name' => config('app.site_name', 'My Application'),
            // Ajoutez d'autres paramètres ici
        ];

        return view('presets.parametre.general', compact('settings'));
    }

    public function updateGeneral(Request $request)
    {
        // Validez et mettez à jour les paramètres de la section générale
        $request->validate([
            'site_name' => 'required|string|max:255',
            // Ajoutez d'autres validations ici
        ]);

        Config::set('app.site_name', $request->input('site_name'));
        // Ajoutez des mises à jour de paramètres ici

        return redirect()->route('parametre.general.index')->with('success', 'Paramètres généraux mis à jour avec succès.');
    }

    public function indexCustomization()
    {
        // Récupérez les paramètres actuels pour la section personnalisation
        $settings = [
            'primary_color' => config('app.primary_color', 'blue'),
            'secondary_color' => config('app.secondary_color', 'blue'),
            'default_color' => config('app.default_color', 'blue'),
            'font_size' => config('app.font_size', 14),
        ];

        return view('presets.parametre.customization', compact('settings'));
    }

    public function updateCustomization(Request $request)
    {
        // Validez et mettez à jour les paramètres de la section personnalisation
        $request->validate([
            'primary_color' => 'required|string',
            'secondary_color' => 'required|string',
            'default_color' => 'required|string',
            'font_size' => 'required|integer|min:10|max:30',
        ]);

        Config::set('app.primary_color', $request->input('primary_color'));
        Config::set('app.secondary_color', $request->input('secondary_color'));
        Config::set('app.default_color', $request->input('default_color'));
        Config::set('app.font_size', $request->input('font_size'));

        return redirect()->route('parametre.customization.index')->with('success', 'Paramètres de personnalisation mis à jour avec succès.');
    }

    // Méthode pour afficher le formulaire de profil
    public function indexProfile()
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté
        return view('presets.parametre.profile', compact('user'));
    }

    // Méthode pour mettre à jour le profil
    public function updateProfile(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        // Mettre à jour les informations de l'utilisateur
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        // Rediriger avec un message de succès
        return redirect()->route('parametres.profile.index')->with('success', 'Profil mis à jour avec succès.');
    }

    // Méthode pour mettre à jour le mot de passe
    public function updatePassword(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Vérifier si le mot de passe actuel est correct
        if (!Hash::check($request->input('old_password'), auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe de l'utilisateur
        auth()->user()->update(['password' => Hash::make($request->input('password'))]);

        // Rediriger avec un message de succès
        return back()->with('success', 'Mot de passe mis à jour avec succès.');
    }
}

