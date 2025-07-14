✅ Step 1: Make a Seeder for Roles
✅ Step 2: Add Roles in the Seeder File
✅ Step 3: Call the Seeder from DatabaseSeeder
✅ Step 4: Run the Seeder


✅ Goal: Assign a Role to a User
Let’s say we want:

User Dhiraj to be Admin

User Maya to be Teacher

User Priya to be Student

✅ Step 1: Make a Seeder for Users
✅ Step 2: Add UserSeeder to DatabaseSeeder
✅ Step 3: Assign Roles in UserSeeder
✅ Step 4: Reset and Reseed the Database (optional but safe)
✅ Step 5: Check the Database
Look inside:

users → See Dhiraj, Maya, Priya

roles → Should still show Admin, Teacher, Student

model_has_roles → Should now have 3 rows


✅ Fix: Add HasRoles Trait to User Model
```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // ✅ this line

class User extends Authenticatable
{
    use Notifiable, HasRoles; // ✅ include the trait here

    // ... rest of your model
}
```

php artisan migrate:fresh --seed

✅ Next Step: Protect Routes Based on Role
We want to:

Allow only Admin users to visit /admin/dashboard

Only Teacher users to visit /teacher/dashboard

Only Student users to visit /student/dashboard

Let’s go step-by-step 🐌


