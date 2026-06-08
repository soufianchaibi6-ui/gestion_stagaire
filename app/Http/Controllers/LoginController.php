<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginController extends Controller
{
    // Afficher page login/register
    public function index()
    {
        return view('index');
    }

    // Register
    public function store(Request $request)
    {
        $request->validateWithBag('register', [
            'name'      => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'email'     => 'required|email|unique:login,email',
            'telephone' => 'required',
            'password'  => 'required|min:6|confirmed',
        ]);

        Login::create([
            'name'      => $request->name,
            'prenom'    => $request->prenom,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'password'  => Hash::make($request->password),
        ]);

        return redirect()
            ->route('stagair.login')
            ->with('success', 'Compte créé avec succès');
    }

    // Login
    public function logine(Request $request)
    {
        $request->validateWithBag('login', [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();
            $user = Auth::user();
            return $this->redirectBasedOnStatus($user);
        }

        return back()
            ->withInput(['email' => $request->email])
            ->with('ereur', 'Email ou mot de passe incorrect');
    }

    // Home (formulaire demande)
    public function home()
    {
        $user = Auth::user();
        return $this->redirectBasedOnStatus($user);
    }

    // Logique centrale de redirection
    private function redirectBasedOnStatus($user)
    {
        if (!$user->inscriptions()->exists()) {
            return view('home', compact('user'));
        }

        $inscription = $user->inscriptions;

        switch ($inscription->statut) {
            case 'accepter':
                return redirect()->route('stagaire.chat');

            case 'refuser':
                return redirect()->route('attente', $inscription->id)
                    ->with('ereur', 'Votre demande a été refusée');

            case 'en_attente':
            default:
                return redirect()->route('attente', $inscription->id);
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('stagair.login');
    }
}