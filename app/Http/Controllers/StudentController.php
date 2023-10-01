<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data = Student::all();
       // return $data;
         return view('studentlist', compact('data')); 
    }

    public function go(){
        return view('dashboard'); 
    }
}
