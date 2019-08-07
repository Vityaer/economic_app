<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups  = Group::with('records')->get();
        return view('group.index', [ 'groups' => $groups ]);
        // $records = $groups->map( function($item){ return $item->records; } );
        // return $groups;
        //return view('client.pack', [ 'pack' => $pack, 'tests' => $tests ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        $group->name = $request->name;
        $group->passwordLevel1 = $request->passwordLevel1;
        $group->passwordLevel2 = $request->passwordLevel2;
        $group->save();
        return $group->id;
    }
    public function connect(Request $request){
        $group = Group::find($request->id);
        $result = "code_200";
        if( ($group->passwordLevel1 == $request->password) || ($group->passwordLevel2 == $request->password)){
            $result = $group->name; 
        }
        return $result;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return $group;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
