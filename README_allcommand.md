📘 Laravel Backend API – Complete Command Guide (Beginner → Production)

This README contains all important Laravel Artisan commands
needed to build a production-ready backend API (Flutter / Mobile friendly).

🟢 1️⃣ Project Setup
Create a new Laravel project
composer create-project laravel/laravel todo_api


👉 New Laravel project create করে

Go inside project
cd todo_api

Start local development server
php artisan serve


👉 http://127.0.0.1:8000

🟢 2️⃣ Environment & Configuration
Generate application key
php artisan key:generate


👉 App security key generate করে

Clear config cache (VERY IMPORTANT)
php artisan config:clear
php artisan cache:clear

🟢 3️⃣ API Environment Setup (Laravel 11)
Install API support (routes + Sanctum)
php artisan install:api


👉 Does:

creates routes/api.php

installs Sanctum

prepares API authentication

🟢 4️⃣ Database Setup
Run migrations
php artisan migrate

Reset database (DEV only)
php artisan migrate:fresh

Rollback last migration
php artisan migrate:rollback

🟢 5️⃣ Model & Migration
Create model + migration
php artisan make:model Todo -m


👉 Creates:

app/Models/Todo.php

database/migrations/...create_todos_table.php

Create model + migration + controller
php artisan make:model Todo -mcr

🟢 6️⃣ API Controller
Create API controller (recommended)
php artisan make:controller Api/TodoController --api


👉 Creates CRUD methods:

index

store

show

update

destroy

Normal controller (not API)
php artisan make:controller TodoController

🟢 7️⃣ Request Validation
Create Form Request (validation)
php artisan make:request StoreTodoRequest


👉 Used for validating API input

🟢 8️⃣ Routes
List all routes
php artisan route:list

Clear route cache
php artisan route:clear

🟢 9️⃣ Seeder & Factory (Fake Data)
Create seeder
php artisan make:seeder TodoSeeder

Run seeder
php artisan db:seed

Create factory
php artisan make:factory TodoFactory --model=Todo

🟢 🔐 10️⃣ Authentication (API)
Install Sanctum (if not installed)
composer require laravel/sanctum

Publish Sanctum config
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

Migrate Sanctum tables
php artisan migrate

🟢 11️⃣ Middleware
Create middleware
php artisan make:middleware CheckRole

🟢 12️⃣ Queue & Jobs (Production)
Create job
php artisan make:job SendTodoNotification

Run queue (local)
php artisan queue:work

🟢 13️⃣ Storage & Files
Create storage link
php artisan storage:link

🟢 14️⃣ Logs & Debug
Clear logs
php artisan log:clear

Application status
php artisan about

🟢 15️⃣ Optimization (Production)
Cache config
php artisan config:cache

Cache routes
php artisan route:cache

Optimize application
php artisan optimize

🟢 16️⃣ Maintenance Mode
Enable maintenance
php artisan down

Disable maintenance
php artisan up

🟢 17️⃣ Useful Dev Commands
Tinker (Play with DB)
php artisan tinker

Check Laravel version
php artisan --version

🟢 18️⃣ Production Deployment (Basic)
composer install --no-dev
php artisan key:generate
php artisan migrate --force
php artisan optimize

🧠 FINAL SUMMARY (Must Remember)
Stage	Command Type
Setup	create-project
API	install:api
DB	migrate
CRUD	make:model, make:controller
Auth	Sanctum
Prod	optimize, cache
🚀 Recommended Learning Path (FOR YOU)

1️⃣ Routing
2️⃣ Controller logic
3️⃣ Validation
4️⃣ Auth (login/register)
5️⃣ Flutter → API (Dio + Riverpod)
6️⃣ Production deploy

🏁 শেষ কথা

👉 এই README ফাইলটা তোমার Laravel backend cheat-sheet
👉 ৬ মাস পরেও তুমি এটা খুলে দেখবে
👉 Real production project বানাতে এই command গুলাই লাগে