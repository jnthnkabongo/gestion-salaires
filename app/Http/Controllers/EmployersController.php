<?php

namespace App\Http\Controllers;

use App\Models\employers;
use Illuminate\Http\Request;

class EmployersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.administration.liste-employer');
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
    public function show(employers $employers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employers $employers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employers $employers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employers $employers)
    {
        //
    }
}
