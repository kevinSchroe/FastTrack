<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Administrator';
        $role_admin->save();

        $role_fahrschueler = new Role();
        $role_fahrschueler->name = 'fahrschueler';
        $role_fahrschueler->description = 'Fahrschueler';
        $role_fahrschueler->save();

        $role_fahrlehrer = new Role();
        $role_fahrlehrer->name = 'fahrlehrer';
        $role_fahrlehrer->description = 'Fahrlehrer';
        $role_fahrlehrer->save();

    }
}
