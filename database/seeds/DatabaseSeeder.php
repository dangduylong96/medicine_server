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
        DB::table('users')->insert([
            'username' => 'minhthuc1997',
            'type' => 1,
            'password' => bcrypt('minhthuc123')
        ]);
    }
}
