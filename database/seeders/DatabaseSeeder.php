<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin=new User();
        $admin->name="admin";
        $admin->email="admin@gmail.com";
        $admin->email_verified_at=NOW();
        $admin->password=bcrypt('password');
        $admin->visible_password="password";
        $admin->occupation="CEO";
        $admin->address="Bangladesh";
        $admin->phone="123456789";
        $admin->is_admin=1;
        $admin->save();


    }
}
