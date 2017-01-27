<?php

use Illuminate\Database\Seeder;

class FakeLogins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Melenquizz\User::forceCreate([
           "name" => "Julien Tant",
           "email" => "julien@craftyx.fr",
           "password" => bcrypt("test"),
        ]);
    }
}
