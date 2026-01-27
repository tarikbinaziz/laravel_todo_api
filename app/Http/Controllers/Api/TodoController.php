<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // GET /api/todos
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Todo::all(),
        ]);
    }

    // POST /api/todos
    public function store(Request $request)
    {
        // 1️⃣ Validate input
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // 2️⃣ Create todo in database
        $todo = Todo::create([
            'title' => $request->title,
        ]);

        // 3️⃣ Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Todo created successfully',
            'data' => $todo,
        ], 201);
    }
}
