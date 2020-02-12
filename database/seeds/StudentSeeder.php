<?php

use Illuminate\Database\Seeder;
use App\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Student::create([
        // 	'nama'=>'Alan',
        // 	'jk'=>'L'
        // ]);
        // Student::create([
        // 	'nama'=>'Alan',
        // 	'jk'=>'P'
        // ]);
        // for ($i=0; $i <20 ; $i++) 
        // { 
            
        //     $jk = 'P';
        //     if ($i > 10) 
        //     {
        //         $jk = 'L';
        //     };
        //     Student::create([
        //         'nama'=>'Alan-' .$i,
        //         'jk'=> $jk,       
        //     ]);   
        // }
        /*for ($i=0; $i <20 ; $i++) { 
            # code...
            Student::create([
            "nama"=>"Alan-" .$i,
            "jk"=>"L",       
        ]);  
            Student::create([
            "nama"=>"Azete-" .$i,
            "jk"=>"P",       
        ]);  
            
        }*/
    }
}
