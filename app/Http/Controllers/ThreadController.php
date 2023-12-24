<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    // Formulario editar pregunta
    public function edit(Thread $thread)
    {
        $this->authorize('update', $thread);
        $categories = Category::get();

        return view('thread.edit', compact('categories', 'thread'));
    }

    // Metodo actualizar pregunta.
    public function update(Request $request, Thread $thread)
    {
        $this->authorize('update', $thread);
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $thread->update($request->all());

        return redirect()->route('thread', $thread);
    }

    // Formulario crear pregunta.
    public function create(Request $request, Thread $thread)
    {
        $categories = Category::get();

        return view('thread.create', compact('categories', 'thread'));
    }

    // Metodo que almacena la nueva pregunta.
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->threads()->create($request->all());

        return redirect()->route('dashboard');
    }
}
