❌ Error টা কী বলছে?
Target class [App\Http\Controllers\Api\TodoController] does not exist


বাংলায় বললে:

👉 Laravel বলছে
“আমি TodoController খুঁজে পাচ্ছি না”

এটার মানে ৩টার একটাও ভুল হলেই এই error আসে:

1️⃣ Controller file exist করে না
2️⃣ Controller file আছে কিন্তু namespace ভুল
3️⃣ Route file এ controller path ভুল লেখা

🧠 Laravel এ কীভাবে controller খোঁজে?

Route এ তুমি লিখেছো:

use App\Http\Controllers\Api\TodoController;


Laravel তখন খোঁজে:

app/Http/Controllers/Api/TodoController.php


এবং file এর ভেতরে namespace exactly এটা হতে হবে:

namespace App\Http\Controllers\Api;


একটা জায়গাও mismatch হলে → 500 error

✅ FIX (একদম step by step, কিছু skip করো না)
✅ Step 1: Controller file সত্যিই আছে কিনা চেক করো

Terminal এ run করো:

ls app/Http/Controllers/Api


❌ যদি বলে:

No such file or directory


তাহলে controller তৈরি হয়নি।

✅ Step 2: Controller তৈরি করো (SAFE WAY)

এই command টা দাও:

php artisan make:controller Api/TodoController


এতে automatically তৈরি হবে:

app/Http/Controllers/Api/TodoController.php

✅ Step 3: Controller file খুলে EXACT কোড বসাও

app/Http/Controllers/Api/TodoController.php

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Todo::all(),
        ]);
    }
}


👉 এখানে সবচেয়ে important line:

namespace App\Http\Controllers\Api;


এইটা না থাকলে error হবেই।

✅ Step 4: routes/api.php ঠিক আছে কিনা দেখো

routes/api.php ফাইলটা must exist করতে হবে।

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

Route::get('/todos', [TodoController::class, 'index']);


👉 এখানে /api prefix Laravel নিজে যোগ করে।

✅ Step 5: Todo Model আছে কিনা চেক করো

Run:

ls app/Models


যদি Todo.php না থাকে:

php artisan make:model Todo

✅ Step 6: Cache clear + restart server (VERY IMPORTANT)
php artisan optimize:clear
php artisan serve

🔥 এখন test করো

Browser এ যাও:

http://127.0.0.1:8000/api/todos


✅ Expected output:

{
  "success": true,
  "data": []
}

🧩 কেন এই error হচ্ছিল (তোমার শেখার জন্য)

Laravel route load করে

Route → Controller call করে

Controller না পেলে → 500 error

Laravel 11 এ সবকিছু namespace-sensitive

একটা spelling ভুল হলেও error।