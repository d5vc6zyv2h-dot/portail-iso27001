<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Afficher la liste des utilisateurs
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Ajouter un utilisateur
     */
    public function create()
    {   
        $roles = \Spatie\Permission\Models\Role::all();
   
        return view('users.create', compact('roles'));
    }

    /**
     * Enregistrer un utilisateur
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        \App\Services\AuditService::log(

        'Création utilisateur',
        'Création du compte ' . $user->name . ' avec le rôle ' . $request->role
        );
  
        return redirect()
            ->route('users.index')
            ->with('success', 'Utilisateur ajouté avec succès.');
    }

    /**
     * Consulter un utilisateur
     */
    public function show(User $user)
    {
        $user->load('roles');

        return view('users.show', compact('user'));
    }

    /**
     * Modifier un utilisateur
     */
    public function edit(User $user)
    {
        $roles = \Spatie\Permission\Models\Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        \App\Services\AuditService::log(
            'Modification utilisateur',
            'Modification du compte ' . $user->name
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Supprimer un utilisateur
     */
    public function destroy(User $user)
{
    if ($user->hasRole('Administrateur')) {

        $nombreAdministrateurs = User::role('Administrateur')->count();

        if ($nombreAdministrateurs <= 1) {
            return redirect()
                ->route('users.index')
                ->with('error', 'Impossible de supprimer le dernier administrateur du portail.');
        }
    }

    \App\Services\AuditService::log(
        'Suppression utilisateur',
        'Suppression du compte ' . $user->name
    );

    $user->delete();

    return redirect()
        ->route('users.index')
        ->with('success', 'Utilisateur supprimé avec succès.');
       }   
    }
