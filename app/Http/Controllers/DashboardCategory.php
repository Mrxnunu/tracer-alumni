<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($validateData);
        return redirect('/dashboard/categories')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validasi input
        $validateData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // Update slug hanya jika nama berubah
        if ($category->name !== $validateData['name']) {
            $validateData['slug'] = null; // Hapus slug lama
        }

        // Update data kategori
        $category->update($validateData);

        return redirect('/dashboard/categories')->with('success', 'Kategori Artikel Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/dashboard/categories')->with('success', 'Kategori Artikel Berhasil di Hapus');
    }
}
