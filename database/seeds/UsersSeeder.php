<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'departemen' => 'JMU',
            'kode' => '4',
            'email' => 'jmu@gt-tires.com',
            'password' => bcrypt('12345678'),
     ]);
    }
}
