<?php

namespace App\Http\Controllers;

use App\Timetable;
use Illuminate\Http\Request;
use App\Hall;
use App\Subject;
use App\Day;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timetables = Timetable::with('day', 'subject', 'hall')
        ->get();

        return view('timetables.index',compact('timetables'));
    }

    public function create()
    {
        $days = Day::pluck('day_name', 'id');

        $halls = Hall::pluck('lecture_hall_name', 'id');

        $subjects = Subject::pluck('subject_name', 'id', 'subject_code');

        return view('timetables.create', compact('days', 'subjects', 'halls','timetables'));

    }

    public function store(Request $request)
    {
        Timetable::create([
    		'user_id' => auth()->user()->id,
    		'day_id' => $request->day_id,
            'subject_id' => $request->subject_id,
    		'hall_id' => $request->hall_id,
    		'time_from' => $request->time_from,
            'time_to' => $request->time_to,
    	]);

        return redirect()->route('timetables.index')
                        ->with('success','Timetables created successfully.');

    }

    public function show(Timetable $timetable)
    {
        return view('timetables.show',compact('timetable'));
    }

    public function edit(Timetable $timetable)
    {
        $days = Day::pluck('day_name', 'id');

        $halls = Hall::pluck('lecture_hall_name', 'id');

        $subjects = Subject::pluck('subject_name', 'id', 'subject_code');

        return view('timetables.edit',compact('days', 'subjects', 'halls', 'timetable'));

    }

    public function update(Request $request, Timetable $timetable)
    {
        $timetable->update($request->all());

        return redirect()->route('timetables.index')
                        ->with('success','Timetables updated successfully');
    }

    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
  
        return redirect()->route('timetables.index')
                        ->with('success','Timetabe deleted successfully');
    }
}
