Here is your routes/api.php file again:

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

Route::get('/todos', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::put('/todos/{id}', [TodoController::class, 'update']);
Route::delete('/todos/{id}', [TodoController::class, 'destroy']);

Line by line explanation
1️⃣ <?php

This is always at the top of a PHP file

Means: “Hey PHP, start interpreting this file”

Every Laravel file starts with this.

2️⃣ use Illuminate\Support\Facades\Route;

use = import / include a class or tool

Illuminate\Support\Facades\Route = the Route class of Laravel

Route class lets us create routes (URL paths)

Basically:

Route = a tool to say "when user visits this URL, do this action"

3️⃣ use App\Http\Controllers\Api\TodoController;

Again use = import something

App\Http\Controllers\Api\TodoController = the controller file that has all your code to manage todos

Think:

TodoController = brain behind your API


By importing it, we can now tell Laravel to call it when someone hits /api/todos

4️⃣ Route::get('/todos', [TodoController::class, 'index']);

Break it down:

Route → the tool we imported

:: → says “use a function from this class”

get → HTTP method GET (browser uses GET, mobile app uses GET)

'/todos' → URL path after 127.0.0.1:8000/api

So full URL = http://127.0.0.1:8000/api/todos

[TodoController::class, 'index'] → “call the index function inside TodoController”

💡 Word meaning:

Route::get('/todos', [TodoController::class, 'index']);


= “When someone sends GET request to /api/todos → run index() function in TodoController”

5️⃣ Route::post('/todos', [TodoController::class, 'store']);

Same as GET, but:

post → HTTP POST request (used to create something)

'/todos' → URL path

[TodoController::class, 'store'] → call store() function to save new todo

Example:

POST /api/todos
{
  "title": "Learn Laravel"
}

6️⃣ Route::put('/todos/{id}', [TodoController::class, 'update']);

put → HTTP PUT request (used to update something)

'/todos/{id}' → URL path with dynamic variable id

{id} = placeholder

If you want to update todo #5 → URL = /api/todos/5

[TodoController::class, 'update'] → call update() function in TodoController

So full meaning:

“When user sends PUT to /api/todos/{id}, run update() in TodoController”

7️⃣ Route::delete('/todos/{id}', [TodoController::class, 'destroy']);

delete → HTTP DELETE request (used to remove something)

'/todos/{id}' → URL with id

[TodoController::class, 'destroy'] → call destroy() function

Meaning:

“When user sends DELETE to /api/todos/{id}, remove that todo”

🧠 Beginner summary (very simple)
HTTP Method	URL	Controller Function	What it does
GET	/todos	index()	Get all todos
POST	/todos	store()	Add a new todo
PUT	/todos/{id}	update()	Update a todo
DELETE	/todos/{id}	destroy()	Delete a todo
💡 Extra tip:

All these routes are automatically prefixed with /api because it’s api.php

So final URLs:

GET     /api/todos
POST    /api/todos
PUT     /api/todos/{id}
DELETE  /api/todos/{id}


Controllers contain the actual code to handle data (create, read, update, delete)