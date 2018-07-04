<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_fahrschueler = Role::where('name', 'fahrschueler')->first();
        $role_fahrlehrer = Role::where('name', 'fahrlehrer')->first();

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('pass');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $fahrschueler = new User();
        $fahrschueler->name = 'fahrschueler';
        $fahrschueler->email = 'fahrschueler@example.com';
        $fahrschueler->password = bcrypt('pass');
        $fahrschueler->save();
        $fahrschueler->roles()->attach($role_fahrschueler);

        $fahrlehrer = new User();
        $fahrlehrer->name = 'fahrlehrer';
        $fahrlehrer->email = 'fahrlehrer@example.com';
        $fahrlehrer->password = bcrypt('pass');
        $fahrlehrer->save();
        $fahrlehrer->roles()->attach($role_fahrlehrer);

    }
}
