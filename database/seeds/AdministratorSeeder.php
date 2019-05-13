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
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@alcent.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("alcent");
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
