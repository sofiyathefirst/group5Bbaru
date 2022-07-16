<?php

use Illuminate\Database\Seeder;
use App\Hall;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hall_seed = [
            ['id'=>'1','lecture_hall_name'=>'Makmal Komputer 6','lecture_hall_place'=>'Bangunan FSKM'], 
            ['id'=>'2','lecture_hall_name'=>'Bilik Kuliah 17','lecture_hall_place'=>'Blok Kuliah'], 
            ['id'=>'3','lecture_hall_name'=>'Dewan Seminar 1B','lecture_hall_place'=>'Blok Kuliah'], 
            ['id'=>'4','lecture_hall_name'=>'Bilik Kuliah 13','lecture_hall_place'=>'Blok Kuliah'], 
            ['id'=>'5','lecture_hall_name'=>'Makmal Komputer 11','lecture_hall_place'=>'Bangunan FSKM'] 
            ]; 
 
         
        foreach ($hall_seed as $hall_seed) 
        { 
            Hall::firstOrCreate($hall_seed); 
        }
        
    }
}
