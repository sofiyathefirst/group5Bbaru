<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash; 

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all();
        //dd( $students); // check database masuk ke tak
        return view('students.index',compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
  
        User::create($request->all());
   
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');

    }

    public function show (User $student)
    {
        return view('students.show',compact('student'));
    }

    public function edit(User $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
  
        $student->update($request->all());
  
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }

    public function destroy(User $student)
    {
        $student->delete();
  
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}
