<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::ordered()->paginate(10);

        return view('system-base.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system-base.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'short_description' => 'nullable|string',
                'price' => 'nullable|numeric|min:0',
                'price_type' => 'nullable|in:fixed,hourly,custom',
                'status' => 'required|in:active,inactive,draft',
                'sort_order' => 'nullable|integer|min:0',
                'features' => 'nullable|array',
                'category' => 'nullable|string|max:255',
                'duration' => 'nullable|string|max:255',
            ]);

            $service = Service::create($request->all());

            if ($service) {
                return redirect()->route('dashboard.services.index')
                    ->with('success', 'Serviço criado com sucesso!');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Erro ao criar serviço. Tente novamente.');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao criar serviço: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('system-base.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('system-base.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'short_description' => 'nullable|string',
                'price' => 'nullable|numeric|min:0',
                'price_type' => 'nullable|in:fixed,hourly,custom',
                'status' => 'required|in:active,inactive,draft',
                'sort_order' => 'nullable|integer|min:0',
                'features' => 'nullable|array',
            ]);

            $service->update($request->all());

            return redirect()->route('dashboard.services.index')
                ->with('success', 'Serviço atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar serviço: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $service->delete();

            return redirect()->route('dashboard.services.index')
                ->with('success', 'Serviço excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao excluir serviço: ' . $e->getMessage());
        }
    }
}