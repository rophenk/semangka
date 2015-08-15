<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('InstansiTableSeeder');
        $this->call('ServerTableSeeder');
        $this->call('ApiTableSeeder');
        $this->call('DataTableSeeder');
        $this->call('RoleTableSeeder');

        Model::reguard();
    }
}
