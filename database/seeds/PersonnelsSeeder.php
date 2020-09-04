<?php

use Illuminate\Database\Seeder;

class PersonnelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('personnels')->insert([
            'name' => 'Mesut Aydin',
            'position' => 'PHP Dev',
            'office' => 'Turkey',
            'age' => 27,
            'salary' => 82123,
            'created_at' => date('Y.m.d H:i:s'),
            'updated_at' => date('Y.m.d H:i:s')
        ]);
    }
}
