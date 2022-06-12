<?php

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
        //   for ($i = 1; $i <= 10; $i++) {
        //     User::create([
        //         'username'           => 'test' .$i,
        //         'mail'          => $i .'@test.com',
        //         'password'       => Hash::make('12345678'),
        //         'bio'          => '自己紹介を入力してください。',
        //         'created_at'     => now(),
        //         'updated_at'     => now()
        //     ]);
        // }
        DB::table('users')->insert([
            'username'           => 'test',
            'mail'          =>  '@test.com',
            'password'       => Hash::make('12345678'),
            'bio'          => '自己紹介を入力してください。',
            'created_at'     => now(),
            'updated_at'     => now()
        ]);

    }
}
