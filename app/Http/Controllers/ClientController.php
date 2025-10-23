<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $clients = Client::latest()
            ->paginate(10);

        return view('system-base.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('system-base.clients.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:clients,email',
                'phone' => 'nullable|string|max:20',
                'company' => 'nullable|string|max:255',
                'status' => 'required|in:active,inactive,pending',
                'notes' => 'nullable|string',
            ]);

            $validated['user_id'] = Auth::id();
            Client::create($validated);

            return redirect()->route('dashboard.clients.index')
                ->with('success', 'Cliente criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao criar cliente: ' . $e->getMessage());
        }
    }

    public function show(Client $client)
    {
        return view('system-base.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('system-base.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:clients,email,' . $client->id,
                'phone' => 'nullable|string|max:20',
                'company' => 'nullable|string|max:255',
                'status' => 'required|in:active,inactive,pending',
                'notes' => 'nullable|string',
            ]);

            $client->update($validated);

            return redirect()->route('dashboard.clients.index')
                ->with('success', 'Cliente atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar cliente: ' . $e->getMessage());
        }
    }

    public function destroy(Client $client)
    {
        try {
            $client->delete();

            return redirect()->route('dashboard.clients.index')
                ->with('success', 'Cliente excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao excluir cliente: ' . $e->getMessage());
        }
    }
}
