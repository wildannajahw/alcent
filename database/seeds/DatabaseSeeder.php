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
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@alcent.test";
        $administrator->address = "administrator@alcent.test";
        $administrator->phone = "administrator@alcent.test";
        $administrator->avatar = "administrator@alcent.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("alcent");
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
