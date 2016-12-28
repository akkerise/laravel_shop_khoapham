<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(
        [
            'username' => 'nguyenthanh88',
            'email' => 'nguyenthanhabc@gmail.com',
            'password' => '$2y$10$0eaTDgCHfP01kqYLxfOikOic6GNqvtBQ2crH4J/1hkl.32UdJToCy',
            'level' => 1,
            'remember_token' => 'XLCppqgGf44xOpM44nICJsY74AahxA0HEWEL0NFx4cF0GH2Zk7H4WWDdnVJu',
        ]
      );
    }
}
