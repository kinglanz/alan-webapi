<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class TestApiController extends Controller
{
    public function test(Request $request)
    {
    	// $data = [
    	// 	[
    	// 		'nama'=>'Alan',
    	// 		'jk'=>'L'
    	// 	],
    	// 	[
    	// 		'nama'=>'Alan1',
    	// 		'jk'=>'P'
    	// 	]
    	// ];
        $katakunci = $request->get('katakunci');
        $data = Student::where('nama','like','%'.$katakunci.'%')->paginate(5);
    	return $data;
    }
}
