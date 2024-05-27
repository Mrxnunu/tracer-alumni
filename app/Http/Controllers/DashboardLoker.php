<?php

namespace App\Http\Controllers;

use App\Models\tbl_info_loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardLoker extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.loker.index', [
            'loker' => tbl_info_loker::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.loker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('infoloker-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        tbl_info_loker::create($validateData);
        return redirect('/dashboard/loker')->with('success', 'Data Info Loker Berhasil di Tambahkan');
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
    public function edit(string $id)
    {
        $loker = tbl_info_loker::findOrFail($id);
        return view('dashboard.loker.edit', compact('loker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $loker = tbl_info_loker::findOrFail($id);
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        // Handle image update if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete($loker->image);
            // Store new image
            $validateData['image'] = $request->file('image')->store('infoloker-images');
        }

        $loker->update($validateData);

        return redirect('/dashboard/loker')->with('success', 'Data Info Loker Berhasil Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loker = tbl_info_loker::findOrFail($id);
        // Hapus gambar terkait jika ada
        if ($loker->image) {
            Storage::delete($loker->image);
        }
        $loker->delete();

        return redirect('/dashboard/loker')->with('success', 'Data Info Loker Berhasil Berhasil di Hapus');
    }
}
