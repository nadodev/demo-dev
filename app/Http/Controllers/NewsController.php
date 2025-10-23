<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('system-base.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system-base.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'excerpt' => 'nullable|string',
                'category' => 'nullable|string|max:255',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
            ]);

            $news = News::create($request->all());

            if ($news) {
                return redirect()->route('dashboard.news.index')
                    ->with('success', 'Notícia criada com sucesso!');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Erro ao criar notícia. Tente novamente.');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao criar notícia: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('system-base.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('system-base.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'excerpt' => 'nullable|string',
                'category' => 'nullable|string|max:255',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
            ]);

            $news->update($request->all());

            return redirect()->route('dashboard.news.index')
                ->with('success', 'Notícia atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar notícia: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();

            return redirect()->route('dashboard.news.index')
                ->with('success', 'Notícia excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao excluir notícia: ' . $e->getMessage());
        }
    }
}