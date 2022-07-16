<?php

use Illuminate\Database\Seeder;
use App\LecturerGroup;

class LecturerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_seed = [
            ['id'=>'1','name'=>'CS251'],
            ['id'=>'2','name'=>'CS230'],
            ['id'=>'3','name'=>'CS110'],
            ['id'=>'4','name'=>'CS245'],
            ['id'=>'5','name'=>'CS253'],
            ];
       
            foreach ($group_seed as $group_seed)
        {
            LecturerGroup::firstOrCreate($group_seed);
        }
    }
}
