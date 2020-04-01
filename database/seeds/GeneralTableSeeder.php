<?php

use App\General;
use Illuminate\Database\Seeder;

class GeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        General::create(['value'=>'Your Privacy','type'=>1]);
        General::create(['value'=>'Your Terms','type'=>2]);
        General::create(['value'=>'About Us','type'=>3]);
    }
}
