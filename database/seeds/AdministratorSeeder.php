<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\User;
        $administrator->username = "admin";
        $administrator->name = "Admin Global";
        $administrator->email = "admin@admin.com";
        $administrator->password = \Hash::make("admin123");
        $administrator->roles = "ADMIN";

        $administrator->save();
        $this->command->info("Admin berhasil diinsert");
    }
}
