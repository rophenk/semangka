<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->truncate();
        DB::table('role')->insert([
            'id'            => 1,
            'name'          => 'Root',
            'description'   => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'
        ]);
        DB::table('role')->insert([
            'id'            => 2,
            'name'          => 'Administrator',
            'description'   => 'Full access to create, edit, and update companies, and orders.'
        ]);
        DB::table('role')->insert([
            'id'            => 3,
            'name'          => 'Manager',
            'description'   => 'Ability to create new companies and orders, or edit and update any existing ones.'
        ]);
        DB::table('role')->insert([
            'id'            => 4,
            'name'          => 'Company Manager',
            'description'   => 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.'
        ]);
        DB::table('role')->insert([
            'id'            => 5,
            'name'          => 'User',
            'description'   => 'A standard user that can have a licence assigned to them. No administrative features.'
        ]);
    }
}
