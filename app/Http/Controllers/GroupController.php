<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Hash;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        //dd( $groups);
        return view('groups.index',compact('groups'));
    }

    public function create()
    {
        return view('groups.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'part' => 'required',
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index')
                        ->with('success','Lecturer Group created successfully.');

    }

    public function show(Group $group)
    {
        return view('groups.show',compact('group'));
    }

    public function edit(Group $group)
    {
        return view('groups.edit',compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required',
            'part' => 'required',
        ]);

        $group->update($request->all());

        return redirect()->route('groups.index')
                        ->with('success','Group updated successfully');
    }

    public function destroy(Group $group)
    {
        $group->delete();
  
        return redirect()->route('groups.index')
                        ->with('success','Group deleted successfully');
    }
}
