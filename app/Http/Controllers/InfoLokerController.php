<?php

namespace App\Http\Controllers;

use App\Models\tbl_info_loker;
use Illuminate\Http\Request;

class InfoLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('v_loker', [
            "title" => "All Loker",
            "lokers" =>  tbl_info_loker::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_info_loker $loker)
    {
        return view('v_single_loker', [
            "title" => "Single Post",
            "loker" => $loker
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
