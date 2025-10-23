<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::with('client')
            ->latest()
            ->paginate(10);

        return view('system-base.products.index', compact('products'));
    }

    public function create()
    {
        $clients = Client::where('user_id', Auth::id())
            ->where('status', 'active')
            ->get();

        return view('system-base.products.create', compact('clients'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'status' => 'required|in:active,inactive,draft',
                'category' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'features' => 'nullable|array',
                'client_id' => 'nullable|exists:clients,id',
            ]);

            $validated['user_id'] = Auth::id();

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('products', 'public');
            }

            Product::create($validated);

            return redirect()->route('dashboard.products.index')
                ->with('success', 'Produto criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao criar produto: ' . $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('system-base.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $clients = Client::where('user_id', Auth::id())
            ->where('status', 'active')
            ->get();

        return view('system-base.products.edit', compact('product', 'clients'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'status' => 'required|in:active,inactive,draft',
                'category' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'features' => 'nullable|array',
                'client_id' => 'nullable|exists:clients,id',
            ]);

            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $validated['image'] = $request->file('image')->store('products', 'public');
            }

            $product->update($validated);

            return redirect()->route('dashboard.products.index')
                ->with('success', 'Produto atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar produto: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $product->delete();

            return redirect()->route('dashboard.products.index')
                ->with('success', 'Produto excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao excluir produto: ' . $e->getMessage());
        }
    }
}
