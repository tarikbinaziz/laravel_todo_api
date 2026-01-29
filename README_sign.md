Laravel-এ :: (double colon) চিহ্নটিকে Scope Resolution Operator (স্কোপ রেজোলিউশন অপারেটর) বলা হয়। পিএইচপি-তে এটি সাধারণত কোনো ক্লাসের স্ট্যাটিক মেথড (static method), প্রপার্টি, বা কনস্ট্যান্ট কল করার জন্য ব্যবহৃত হয়। 
মূল ব্যবহারসমূহ:
স্ট্যাটিক মেথড কল: যেমন User::find($id)।
ক্লাস মেথড অ্যাক্সেস: যেমন \Illuminate\Support\Facades\Route::get()।
Eloquent ORM: ডাটাবেস কোয়েরি করার সময়, যেমন ModelName::all()।
এটি ক্লাস বা নেমস্পেসের ভেতরে প্রবেশ করার একটি পথ হিসেবে কাজ করে।



Laravel / PHP বুঝতে গেলে :: (Scope Resolution Operator) পরিষ্কার জানা দরকার।

আমি simple + practical + Bangla + English mix করে বুঝাচ্ছি।

🔹 :: কী? (What is ::)

:: কে বলে Scope Resolution Operator

👉 এটা ব্যবহার করা হয় class-এর ভিতরের static property, static method, constant access করার জন্য।

🔹 কখন :: ব্যবহার হয়? (When to use ::)
1️⃣ Static Method call করতে
class UserService {
    public static function getAllUsers() {
        return "All users";
    }
}


Call করার সময়:

UserService::getAllUsers();


✅ এখানে :: লাগছে কারণ method টা static

2️⃣ Static Property access করতে
class Config {
    public static $siteName = "My App";
}

echo Config::$siteName;

3️⃣ Class Constant access করতে
class Role {
    const ADMIN = 'admin';
    const USER = 'user';
}

echo Role::ADMIN;


👉 Laravel এ এটা অনেক use হয়

4️⃣ Parent class method call করতে (parent::)
class BaseController {
    public function store() {
        echo "Base store";
    }
}

class UserController extends BaseController {
    public function store() {
        parent::store();
        echo "User store";
    }
}


🧠 parent:: মানে parent class-এর method call

5️⃣ Same class এর static method call করতে (self::)
class Helper {
    public static function format() {
        return self::upper();
    }

    public static function upper() {
        return "HELLO";
    }
}

🔹 Laravel এ real-life use cases
✅ Route facade
Route::get('/users', function () {
    return 'Users';
});


👉 Route একটা Facade class, method static না হলেও facade এর কারণে :: দিয়ে call করা যায়।

✅ Model constant
class Order extends Model {
    const STATUS_PENDING = 'pending';
}

Order::STATUS_PENDING;

✅ Validation Rule
Rule::unique('users', 'email');

✅ Auth / Hash / DB
Auth::user();
Hash::make('password');
DB::table('users')->get();

🔴 :: vs -> (Very Important)
Operator	Use
::	Static member / class level
->	Object / instance level
Example:
$user = new User();

$user->name;      // instance property
User::where('id', 1); // static style (Eloquent)

🧠 মনে রাখার Trick

Object থাকলে → ->
Class থাকলে → ::

✅ Short Summary

:: = class level access

Static method / property / constant call করতে

Laravel Facade, Model constant, Helper, Rule, Auth সব জায়গায় use হয়

চাও তো আমি next এ explain করতে পারি:

self:: vs static::

Laravel Facade ভিতরে কিভাবে কাজ করে

Eloquent এ কেন static মত লাগে কিন্তু আসলে static না

বললেই হবে 🔥