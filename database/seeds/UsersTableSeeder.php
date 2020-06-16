<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert the default admin user
        DB::table('users')->insert(
            array (
                'firstname' => 'admin',
                'lastname' => 'user',
                'email' => 'admin@gmail.com',
                'position_id'=> '1',
                'password_id' => bcrypt('password'),
                'remember_token' => Str::random(10)
            )

        );
// Insert the default normal user
        DB::table('users')->insert(
            array (
                'firstname' => 'normal',
                'lastname' => 'user',
                'email' => 'normal@gmail.com',
                'position_id'=> '4',
                'password_id' => bcrypt('password'),
                'remember_token' => Str::random(10)
            )

        );
    }
}
