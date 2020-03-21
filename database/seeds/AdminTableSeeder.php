<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'm.mohamed@cat.com.eg',
            'password' => 123456,
        ]);
    }
}
