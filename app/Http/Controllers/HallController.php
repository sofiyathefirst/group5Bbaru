<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;
use Hash;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls = Hall::all();
        //dd( $halls);
        return view('halls.index',compact('halls'));
    }

    public function create()
    {
        return view('halls.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'lecture_hall_name' => 'required',
            'lecture_hall_place' => 'required',
        ]);

        Hall::create($request->all());

        return redirect()->route('halls.index')
                        ->with('success','Hall created successfully.');
    }

    public function show(Hall $hall)
    {
        return view('halls.show',compact('hall'));
    }

    public function edit(Hall $hall)
    {
        return view('halls.edit',compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hall $hall)
    {
        $request->validate([
            'lecture_hall_name' => 'required',
            'lecture_hall_place' => 'required',
        ]);

        $hall->update($request->all());

        return redirect()->route('halls.index')
                        ->with('success','Hall updated successfully');

    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
  
        return redirect()->route('halls.index')
                        ->with('success','Hall deleted successfully');

    }
}
