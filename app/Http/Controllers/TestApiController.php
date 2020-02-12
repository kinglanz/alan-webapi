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
     public function index()
    {
        //
        return Student::all();
    }
    public function create(request $request)
    {
        //
        $siswa = new Student;
        $siswa->nama = $request->nama;
        $siswa->jk   = $request->jk;
        $siswa->save();

        return "Data Berhasil ditambahkan";
    }
    public function update(request $request, $id)
    {
        //
        $nama = $request->nama;
        $jk   = $request->nama;

        $siswa = Student::find($id);

        $siswa->nama = $request->nama;
        $siswa->jk   = $request->jk;
        $siswa->save();

        return "Data berhasil di update";
    }
    public function destroy($id)
    {
        //
        $siswa = Student::find($id);
        $siswa->delete();

        return "Data berhasil di hapus";
    }

}
