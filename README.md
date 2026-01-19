🎯 Goal (What we are building)

A REST API with Laravel where we can:

    ✅ Create a Todo

    📄 Get all Todos

    ✏️ Update a Todo

    ❌ Delete a Todo

Data will be stored in MySQL.

🧠 What is Laravel? (Very basic)

Laravel = PHP framework

Instead of writing raw PHP files, Laravel gives:

    Folder structure

    Routing system

    Database tools

    API helpers

Think like this:

Laravel = Flutter framework, PHP = Dart

🛠 Step 1: Install Requirements

You need:

1️⃣ PHP (8.1 or higher)

Check:

php -v

2️⃣ Composer (PHP package manager)

Check:

composer -v


If not installed → tell me, I’ll guide you.

📦 Step 2: Create Laravel Project

Run this command:

composer create-project laravel/laravel todo_api


Go inside project:

cd todo_api


Run server:

php artisan serve


Open browser:

http://127.0.0.1:8000


✅ If you see Laravel welcome page → success



🍺 Install MySQL using Homebrew (macOS)
✅ Step 1: Install Homebrew (if not installed)

Check:

brew --version


If not found, install:

/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"


Restart terminal after install.

✅ Step 2: Install MySQL

Run:

brew install mysql


This may take a few minutes ☕
Let it finish completely.

✅ Step 3: Start MySQL service
brew services start mysql


Check status:

brew services list


You should see:

mysql started

✅ Step 4: Verify MySQL install
mysql --version


You should see:

mysql  Ver 8.0.xx for macos


🎉 MySQL installed correctly

🔐 Step 5: Secure MySQL (IMPORTANT)

Run:

mysql_secure_installation


Choose:

Set root password → YES

Password strength → Medium

Remove anonymous users → YES

Disallow remote root login → YES

Remove test database → YES

Reload privilege tables → YES

🗄 Step 6: Create database

Login:

mysql -u root -p


Enter password.

Create DB:

CREATE DATABASE todo_db;
SHOW DATABASES;


Exit:

exit;

⚙️ Step 7: Update Laravel .env

Open .env and set:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_db
DB_USERNAME=root
DB_PASSWORD=your_mysql_password


⚠️ Replace with real password

🔄 Step 8: Clear Laravel cache
php artisan config:clear
php artisan cache:clear

🧱 Step 9: Run migration
php artisan migrate:fresh


You should see:

Migrated: create_todos_table

🧪 Step 10: Test API
php artisan serve


Test:

GET http://127.0.0.1:8000/api/todos

🧠 Common Brew Commands (Remember)
brew services start mysql
brew services stop mysql
brew services restart mysql