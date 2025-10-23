<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        
        $users = User::latest()->paginate(10);
        return view('system-base.users.index', compact('users'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        
        return view('system-base.users.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Password::defaults()],
                'is_active' => 'boolean',
            ], [
                'name.required' => 'O nome é obrigatório.',
                'email.required' => 'O e-mail é obrigatório.',
                'email.email' => 'O e-mail deve ser válido.',
                'email.unique' => 'Este e-mail já está em uso.',
                'password.required' => 'A senha é obrigatória.',
                'password.confirmed' => 'A confirmação da senha não confere.',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',
                'is_active' => $request->has('is_active'),
            ]);

            if ($user) {
                return redirect()->route('dashboard.users.index')
                    ->with('success', 'Usuário criado com sucesso!');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Erro ao criar usuário. Tente novamente.');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        
        return view('system-base.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        
        return view('system-base.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => ['nullable', 'confirmed', Password::defaults()],
                'is_active' => 'boolean',
            ], [
                'name.required' => 'O nome é obrigatório.',
                'email.required' => 'O e-mail é obrigatório.',
                'email.email' => 'O e-mail deve ser válido.',
                'email.unique' => 'Este e-mail já está em uso.',
                'password.confirmed' => 'A confirmação da senha não confere.',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = 'admin';
            $user->is_active = $request->has('is_active');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('dashboard.users.index')
                ->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar usuário: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        
        try {
            // Não permitir deletar o próprio usuário
            if ($user->id === auth()->id()) {
                return redirect()->route('dashboard.users.index')
                    ->with('error', 'Você não pode deletar seu próprio usuário.');
            }

            $user->delete();

            return redirect()->route('dashboard.users.index')
                ->with('success', 'Usuário deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao deletar usuário: ' . $e->getMessage());
        }
    }
}
