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
        try {
            return response()->json($this->todoapp->all(), 200);
        } catch (\Exception $e) {
            return response()->json($e,500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            return response()->json($this->todoapp->create($request->all()), 201);
        } catch (\Exception $e) {
            return response()->json($e,500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $todoapp = $this->todoapp->find($id);
            return response()->json(["message" => "data found", "data" => $todoapp], 200);
        } catch (\Exception $e) {
            return response()->json($e,500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $todoapp = $this->todoapp->find($id);
            if(!$todoapp){
                return response()->json(["message" => "data not found"], 404);
            }
            $todoapp->title = $request->title;
            $todoapp->description = $request->description;
            $todoapp->status = $request->status;
            $todoapp->save();
            return response()->json(["message" => "data updated", "data" => $todoapp], 200);
        } catch (\Exception $e) {
            return response()->json($e,500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $todoapp = $this->todoapp->find($id);
            if(!$todoapp){
                return response()->json(["message" => "data not found"], 404);
            }
            $todoapp->delete();
            return response()->json(["message" => "data deleted"], 200);
        } catch (\Exception $e) {
            return response()->json($e,500);
        }
    }
}
