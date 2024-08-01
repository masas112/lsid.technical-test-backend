<?php

namespace App\Http\Controllers;

use App\Models\M_todoapp;
use Illuminate\Http\Request;

class C_todoapp extends Controller
{
    protected $todoapp;
    public function __construct() {
        $this->todoapp = new M_todoapp();
    }
    public function index()
    {
        return response()->json($this->todoapp->all(), 200);
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
    public function show(string $id)
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
