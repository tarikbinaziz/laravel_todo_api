এখন আমরা POST Todo API বানাবো — একদম zero level থেকে, line by line, Bangla + English mix করে।

Target:

POST /api/todos


JSON পাঠাবো:

{
  "title": "Learn Laravel"
}

🧠 Before we start (flow বুঝে নাও)

Request flow:

Flutter / Postman
   ↓
Route (api.php)
   ↓
Controller (store method)
   ↓
Model (Todo)
   ↓
Database (todos table)
   ↓
JSON response

1️⃣ Route বানানো (routes/api.php)

Open: routes/api.php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

// GET all todos
Route::get('/todos', [TodoController::class, 'index']);

// POST create todo 👇
Route::post('/todos', [TodoController::class, 'store']);

Line by line:

Route::post → HTTP POST request ধরবে

/todos → URL path

'store' → controller method নাম (আমরা এখন বানাবো)

2️⃣ Controller এ store() method বানানো

Open:

app/Http/Controllers/Api/TodoController.php


এখন পুরো file টা এইভাবে করো (safe copy–paste):

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

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

🧠 store() method — line by line explanation
🔹 public function store(Request $request)

store → নতুন data save করার convention

Request $request → client থেকে আসা data (JSON)

🔹 Validation
$request->validate([
    'title' => 'required|string|max:255',
]);


বাংলায়:

title must থাকতে হবে

string হতে হবে

255 char এর বেশি না

❌ না পাঠালে Laravel auto error দেয় (422)

🔹 Database এ save করা
$todo = Todo::create([
    'title' => $request->title,
]);


মানে:

Todo model ব্যবহার করে

todos table এ row insert

completed auto false হবে (migration default)

🔹 JSON response
return response()->json([
    'success' => true,
    'message' => 'Todo created successfully',
    'data' => $todo,
], 201);


201 → HTTP Created status

Client বুঝবে todo create হয়েছে

3️⃣ Model এ Mass Assignment allow করা (VERY IMPORTANT)

Open:

app/Models/Todo.php


এখন এটা এমন হবে:

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'completed',
    ];
}

কেন এটা দরকার?

Laravel security:

না বললে → create() কাজ করবে না

$fillable মানে → “এই field গুলো safe”

4️⃣ Cache clear + server restart
php artisan optimize:clear
php artisan serve

5️⃣ Test with browser / Postman
❌ Browser দিয়ে POST হয় না

Use Postman / Thunder Client / Flutter

Postman settings:

Method: POST

URL:

http://127.0.0.1:8000/api/todos


Body → raw → JSON:

{
  "title": "Learn Laravel API"
}

✅ Expected response:
{
  "success": true,
  "message": "Todo created successfully",
  "data": {
    "id": 1,
    "title": "Learn Laravel API",
    "completed": false,
    "created_at": "2026-01-25T...",
    "updated_at": "2026-01-25T..."
  }
}

🧪 Verify GET again
GET http://127.0.0.1:8000/api/todos


Now you’ll see the created todo 🎉

🟢 What you learned (important)

✅ POST route
✅ Request validation
✅ Save to MySQL
✅ JSON response
✅ Laravel security (fillable)