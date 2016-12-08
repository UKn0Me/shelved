<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'id' => 1,
            'name' => "Administrators",
            'description' => "Administrators have full control on the site."
        ]);

        DB::table('groups')->insert([
            'id' => 2,
            'name' => "Users",
            'description' => "Users can only make changes to items that belong to them."
        ]);
    }
}
