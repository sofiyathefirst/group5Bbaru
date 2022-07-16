<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject_seed = [
            ['id'=>'1' , 'subject_code'=>'ITT626' , 'subject_name' => 'Backend Technology'], 
            ['id'=>'2' , 'subject_code'=>'ICT650' , 'subject_name' => 'Mobile Technology'], 
            ['id'=>'3' , 'subject_code'=>'ITT569' , 'subject_name' => 'Internet of Things'], 
            ['id'=>'4' , 'subject_code'=>'ITT593' , 'subject_name' => 'Digital Forensic'], 
            ['id'=>'5' , 'subject_code'=>'CSP600' , 'subject_name' => 'Project Formulation'], 
            ]; 
       
            foreach ($subject_seed as $subject_seed)
        {
            Subject::firstOrCreate($subject_seed);
        }
    }
}
