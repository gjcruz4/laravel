<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'George',
            'password' => bcrypt('MH490b'),
        ]);
        DB::table('macs')->insert([
            'name' => 'geej',
            'address' => 'FC:DB:B3:38:16:22',
        ]);
        DB::table('actives')->insert([
            'switch' => 1
        ]);
    }
}
