# 🏫 School Management System — Development Flow (Part 1)

## 🔧 Step 1: Laravel Project Setup

```bash
laravel new schoolms
cd schoolms
```

* Configure `.env` for MySQL DB.
* Run initial migrations:

```bash
php artisan migrate
```

## 🔐 Step 2: Authentication Setup (Laravel Breeze)

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

## 👥 Step 3: User Roles & Permissions (Spatie)

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

* Update `User.php`:

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
    use HasRoles;
}
```

* Create roles using tinker:

```bash
php artisan tinker
```

```php
use Spatie\Permission\Models\Role;
Role::create(['name' => 'Admin']);
Role::create(['name' => 'Teacher']);
Role::create(['name' => 'Student']);
```

## 🏁 Step 4: Role-Based Dashboard Routing

```php
Route::middleware(['auth','role:Admin'])->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::middleware(['auth','role:Teacher'])->get('/dashboard/teacher', [DashboardController::class, 'teacherDashboard'])->name('teacher.dashboard');
Route::middleware(['auth','role:Student'])->get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
```

* Create simple views and controllers for each dashboard.

---

## 🧱 Step 5: ClassRoom Module

```bash
php artisan make:model ClassRoom -m
```

* Migration: `database/migrations/xxxx_xx_xx_create_class_rooms_table.php`

```php
Schema::create('class_rooms', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});
```

* Controller:

```bash
php artisan make:controller ClassRoomController --resource
```

* Routes:

```php
Route::resource('class-rooms', ClassRoomController::class)->middleware('auth','role:Admin');
```

* Create views: `index`, `create`, `edit`, `show`

---

## 🎓 Step 6: Student Management Module

```bash
php artisan make:model Student -m
php artisan make:controller StudentController --resource
```

* Migration includes fields:

```php
Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->foreignId('class_room_id')->constrained();
    $table->string('photo')->nullable();
    $table->timestamps();
});
```

* Implemented:

  * Form with validation & photo upload (stored in `public/uploads/students`)
  * Student listing with class name via relationship
  * Pagination and search functionality
  * View, Edit, and Delete student records
* Routes:

```php
Route::middleware('auth','role:Admin')->group(function(){
    Route::resource('students', StudentController::class);
});
```

---
Here’s **Part 2** of your documentation in markdown format, ready to paste into your `README.md`.

---

# 🏫 School Management System — Development Flow (Part 2)

## 👨‍🏫 Step 7: Teacher Management Module

### Model, Migration, Controller

```bash
php artisan make:model Teacher -m
php artisan make:controller TeacherController --resource
```

### Migration Example

```php
Schema::create('teachers', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('photo')->nullable();
    $table->timestamps();
});
```

### Routes

```php
Route::middleware(['auth','role:Admin'])->group(function () {
    Route::resource('teachers', TeacherController::class);
});
```

### Features

* Admin can create, edit, view, and delete teachers
* Photo upload stored in `public/uploads/teachers`

---

## 📚 Step 8: Subjects Module

### Create Subject Model & Controller

```bash
php artisan make:model Subject -m
php artisan make:controller SubjectController --resource
```

### Migration

```php
Schema::create('subjects', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});
```

### Subject Routes

```php
Route::middleware(['auth','role:Admin'])->resource('subjects', SubjectController::class);
```

---

## 🔗 Step 9: Subject ↔ Class ↔ Teacher Relationships

### Create Pivot Tables

#### 1. `class_subject` (assign subjects to classes)

```bash
php artisan make:migration create_class_subject_table
```

```php
Schema::create('class_subject', function (Blueprint $table) {
    $table->id();
    $table->foreignId('class_room_id')->constrained();
    $table->foreignId('subject_id')->constrained();
    $table->timestamps();
});
```

#### 2. `subject_teacher` (assign teachers to subjects)

```bash
php artisan make:migration create_subject_teacher_table
```

```php
Schema::create('subject_teacher', function (Blueprint $table) {
    $table->id();
    $table->foreignId('subject_id')->constrained();
    $table->foreignId('teacher_id')->constrained();
    $table->timestamps();
});
```

### Update Relationships in Models

#### ClassRoom.php

```php
public function subjects()
{
    return $this->belongsToMany(Subject::class);
}
```

#### Teacher.php

```php
public function subjects()
{
    return $this->belongsToMany(Subject::class);
}
```

#### Subject.php

```php
public function teachers()
{
    return $this->belongsToMany(Teacher::class);
}

public function classRooms()
{
    return $this->belongsToMany(ClassRoom::class);
}
```

---
# 🏫 School Management System — Development Flow (Part 2)

## 👨‍🏫 Step 7: Teacher Management Module

### Model, Migration, Controller

```bash
php artisan make:model Teacher -m
php artisan make:controller TeacherController --resource
```

### Migration Example

```php
Schema::create('teachers', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('photo')->nullable();
    $table->timestamps();
});
```

### Routes

```php
Route::middleware(['auth','role:Admin'])->group(function () {
    Route::resource('teachers', TeacherController::class);
});
```

### Features

* Admin can create, edit, view, and delete teachers
* Photo upload stored in `public/uploads/teachers`

---

## 📚 Step 8: Subjects Module

### Create Subject Model & Controller

```bash
php artisan make:model Subject -m
php artisan make:controller SubjectController --resource
```

### Migration

```php
Schema::create('subjects', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});
```

### Subject Routes

```php
Route::middleware(['auth','role:Admin'])->resource('subjects', SubjectController::class);
```

---

## 🔗 Step 9: Subject ↔ Class ↔ Teacher Relationships

### Create Pivot Tables

#### 1. `class_subject` (assign subjects to classes)

```bash
php artisan make:migration create_class_subject_table
```

```php
Schema::create('class_subject', function (Blueprint $table) {
    $table->id();
    $table->foreignId('class_room_id')->constrained();
    $table->foreignId('subject_id')->constrained();
    $table->timestamps();
});
```

#### 2. `subject_teacher` (assign teachers to subjects)

```bash
php artisan make:migration create_subject_teacher_table
```

```php
Schema::create('subject_teacher', function (Blueprint $table) {
    $table->id();
    $table->foreignId('subject_id')->constrained();
    $table->foreignId('teacher_id')->constrained();
    $table->timestamps();
});
```

### Update Relationships in Models

#### ClassRoom.php

```php
public function subjects()
{
    return $this->belongsToMany(Subject::class);
}
```

#### Teacher.php

```php
public function subjects()
{
    return $this->belongsToMany(Subject::class);
}
```

#### Subject.php

```php
public function teachers()
{
    return $this->belongsToMany(Teacher::class);
}

public function classRooms()
{
    return $this->belongsToMany(ClassRoom::class);
}
```

---



# 🌟 School Management System — Development Flow (Part 3)

## 👤 Step 9: Linking Students with User Table

Each student will have a login, so we link students to Laravel's `users` table.

### 1. Update Student Migration

```php
$table->foreignId('user_id')->constrained()->onDelete('cascade');
```

Run fresh migration if needed or alter manually.

### 2. Update Student Model

```php
public function user() {
    return $this->belongsTo(User::class);
}
```

### 3. Update Create/Edit Student Forms

Assign a user when creating a student (either select or create on the fly).

## 🔗 Step 10: Role-based Login Redirect

### Controller: `LoginRedirectController`

```php
public function redirect() {
    if (auth()->user()->hasRole('Admin')) {
        return redirect()->route('admin.dashboard');
    }
    if (auth()->user()->hasRole('Teacher')) {
        return redirect()->route('teacher.dashboard');
    }
    if (auth()->user()->hasRole('Student')) {
        return redirect()->route('student.dashboard');
    }
    abort(403);
}
```

### Route

```php
Route::get('/redirect-after-login', [LoginRedirectController::class, 'redirect'])->middleware('auth')->name('login.redirect');
```

### Update `LoginController`

Override the default redirect:

```php
protected function authenticated(Request $request, $user) {
    return redirect()->route('login.redirect');
}
```

## 🔒 Step 11: Role-Based Access using `@role` and `@can`

### Blade Usage

```blade
@role('Admin')
    <a href="{{ route('students.edit', $student) }}">Edit</a>
@endrole

@can('view student list')
    <a href="{{ route('students.show', $student) }}">View</a>
@endcan
```

### Controller Middleware Setup

```php
Route::middleware(['auth', 'can:view student list'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
});
```

Admins retain full access:

```php
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('students', StudentController::class)->except(['index', 'show']);
});
```

## 🔍 Step 12: Assign Permission to Teacher

Use Tinker:

```bash
php artisan tinker
```

```php
use Spatie\Permission\Models\Permission;
Permission::firstOrCreate(['name' => 'view student list']);

$teacher = \App\Models\User::find(3); // teacher user
$teacher->givePermissionTo('view student list');
```

## 🔹 Step 13: Hide Actions for Teachers

In Blade:

```blade
@can('view student list')
    <a href="{{ route('students.show', $student) }}">View</a>
@endcan

@role('Admin')
    <a href="{{ route('students.edit', $student) }}">Edit</a>
@endrole
```

---


# 🏫 School Management System — Development Flow (Part 4)

## 🔐 Step 13: Laravel Breeze Login Form Enhancements

We enhanced the Breeze login form to allow easy test logins as Admin, Teacher, or Student.

### ✅ Add Test Role Login Toggle (on login form)

* Modified `resources/views/auth/login.blade.php`:

```blade
<div class="mb-4 flex gap-2">
    <button type="button" onclick="autoFill('admin')" class="px-3 py-1 bg-red-500 text-white rounded">Admin</button>
    <button type="button" onclick="autoFill('teacher')" class="px-3 py-1 bg-blue-500 text-white rounded">Teacher</button>
    <button type="button" onclick="autoFill('student')" class="px-3 py-1 bg-green-500 text-white rounded">Student</button>
</div>
<script>
    function autoFill(role) {
        const creds = {
            admin: { email: 'admin@test.com', password: 'password' },
            teacher: { email: 'teacher@test.com', password: 'password' },
            student: { email: 'student@test.com', password: 'password' },
        };
        document.querySelector('#email').value = creds[role].email;
        document.querySelector('#password').value = creds[role].password;
    }
</script>
```

## 🖼️ Step 14: Image Upload Fix (Student/Teacher)

### ✅ Problem

Images weren't displaying due to temporary file path (e.g., `/tmp/php...`) being stored in the database instead of final destination.

### ✅ Solution

Ensure image is moved and path saved properly:

```php
if ($request->hasFile('photo')) {
    $photo = $request->file('photo');
    $path = $photo->store('uploads/students', 'public');
    $student->photo = $path;
}
```

And in the Blade view:

```blade
<img src="{{ asset('storage/' . $student->photo) }}" class="w-32 rounded" />
```

### 🗂 Folder Structure

```
public/
└── storage/
    └── uploads/
        ├── students/
        └── teachers/
```

Make sure to run:

```bash
php artisan storage:link
```

## 🐞 Step 15: Fix 404 Error on Student Create Page

### ✅ Problem

Visiting `/students/create` resulted in 404 error, even for Admin users.

### ✅ Cause

The route was excluded due to this line:

```php
Route::resource('students', StudentController::class)->except('index', 'show');
```

But these two routes were **defined separately** for `Admin + Teacher` with `@can` middleware.

### ✅ Final Route Fix

```php
Route::middleware(['auth', 'can:view student list'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
});

Route::middleware(['auth','role:Admin'])->group(function() {
    Route::resource('students', StudentController::class)->except('index','show');
});
```

Ensure that your admin user has the correct role and permissions.

## ✅ Step 16: Blade UI Protection using @role and @can

Used the following Blade directives to hide/show action buttons:

```blade
@can('view student list')
    <a href="{{ route('students.show', $student) }}" class="btn btn-info">View</a>
@endcan

@role('Admin')
    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('students.destroy', $student) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete</button>
    </form>
@endrole
```

---
Here is **🧩 Part 5** of your School Management System documentation in **Markdown format**, ready to paste into your `README.md`.

---

# 🧼 School Management System — Development Flow (Part 5)

## 🧹 Step 16: Final Cleanups & Security

### ✅ Ensure Proper Route Protection

```php
// Student listing viewable by Admins and Teachers with permission
Route::middleware(['auth', 'can:view student list'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
});

// Admin-only routes
Route::middleware(['auth','role:Admin'])->group(function(){
    Route::resource('students', StudentController::class)->except('index', 'show');
    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('class-rooms', ClassRoomController::class);
});
```

### 🔐 Check Middleware Setup

Make sure all routes are guarded with either `auth`, `role`, or `can`.

---

## 🧪 Step 17: Testing Flow

Create test users with Tinker:

```bash
php artisan tinker
```

```php
use App\Models\User;
use Spatie\Permission\Models\Role;

$admin = User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
]);
$admin->assignRole('Admin');

$student = User::create([
    'name' => 'Student User',
    'email' => 'student@example.com',
    'password' => bcrypt('password'),
]);
$student->assignRole('Student');

$teacher = User::create([
    'name' => 'Teacher User',
    'email' => 'teacher@example.com',
    'password' => bcrypt('password'),
]);
$teacher->assignRole('Teacher');
```

---

## 📦 Step 18: Project Structure Overview

```
schoolms/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php
│   │   │   ├── StudentController.php
│   │   │   ├── TeacherController.php
│   │   │   ├── SubjectController.php
│   │   │   └── ClassRoomController.php
│   ├── Models/
│   │   ├── Student.php
│   │   ├── Teacher.php
│   │   ├── Subject.php
│   │   └── ClassRoom.php
├── resources/views/
│   ├── students/
│   ├── teachers/
│   ├── subjects/
│   ├── class_rooms/
│   └── dashboard/
├── public/uploads/
│   ├── students/
│   └── teachers/
└── routes/web.php
```

---

## 🚀 Step 19: Deployment Readiness Checklist

* [ ] Remove auto-fill test login buttons
* [ ] Add CSRF protection (`@csrf`) in all forms (already done by Laravel Blade)
* [ ] Move file uploads to `storage` and use Laravel’s `storage:link`
* [ ] Validate image upload type and size
* [ ] Use environment variables for credentials and keys
* [ ] Migrate from SQLite/local DB to MySQL/PostgreSQL in production

---

✅ That concludes the complete documentation set.



