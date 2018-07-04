<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // zuerst die Role-Tabelle füttern ...
        $this->call(RoleTableSeeder::class);
        // ... denn der User benötigt diese Roles
        $this->call(UserTableSeeder::class);
    }
}
