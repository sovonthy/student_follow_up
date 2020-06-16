<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //create 4 position for app
          DB::table('positions')->insert(
            array(
                'name' => 'Training Manager',
           )
        );

        DB::table('positions')->insert(
            array(
                'name' => 'SNA Trainer',
        )
        );

            DB::table('positions')->insert(
                array(
                    'name' => 'WEP Trainer',
            )
            );
                DB::table('positions')->insert(
                array(
                    'name' => 'Educator',
                )
                );
    }
}
