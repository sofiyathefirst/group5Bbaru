<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Hash;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        //dd( $subjects);
        return view('subjects.index',compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required',
            'subject_name' => 'required',
        ]);

        Subject::create($request->all());
   
        return redirect()->route('subjects.index')
                        ->with('success','Subject created successfully.');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show',compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit',compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_code' => 'required',
            'subject_name' => 'required',
        ]);

  
        $subject->update($request->all());
  
        return redirect()->route('subjects.index')
                        ->with('success','Subject updated successfully');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
  
        return redirect()->route('subjects.index')
                        ->with('success','Subject deleted successfully');
    }
}
