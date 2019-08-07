<?php

namespace App\Http\Controllers;

use App\Record;
// use App\Group as GroupModel;
use App\Group;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $records = Record::all();
        // return $records;
        //return view('group.index', [ 'groups' => $groups ]);
        //return view('client.pack', [ 'pack' => $pack, 'tests' => $tests ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $groups = Group::all();
        // return view('record.create', [ 'groups' => $groups ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$result = "code_200";
    	$group = Group::find($request->group_id);
        if( ($group->passwordLevel1 == $request->password) || ($group->passwordLevel2 == $request->password)){
	        $record = new Record;
	        $record->date = $request->date;
	        $record->cost = $request->cost;
	        $record->type = $request->type;
	        $record->comment  = $request->comment;
	        $record->group_id = $request->group_id;
	        $record->save();
	        $result = $record->id;
    	}
        return $result;
    }
    public function load(Request $request)
    {
        $group = Group::find($request->idGroup);
        if( ($group->passwordLevel1 == $request->password) || ($group->passwordLevel2 == $request->password)){
                $time = $request->timeUpdate;
                $records = Record::where('group_id', $request->idGroup)->where(function ($query) use($time) {
                    $query->where('updated_at', '>', $time);
                })->get();
                return $records;
        }else{
            return "code_200";
        }
    }

    public function rewrite(Request $request)
    {
    	$result = "code_200";
        $group = Group::find($request->idGroup);
        if($group->passwordLevel2 == $request->password){
			$record = Record::find($request->idRecord);
			if($record->group_id == $group->id){
				$record->date = $request->date;
		        $record->cost = $request->cost;
		        $record->type = $request->type;
		        $record->comment  = $request->comment;
		        $record->updated_at = date('Y-m-d H:i:s');
		        $record->save();
		        $result = "code_100";
			}                 
        }else if($group->passwordLevel1 == $request->password){
        	$result = "code_165";
        }
        return $result;
    }

    private function validateGroup(Group $group){
        $groupOnSever = Group::find($request->idGroup);
        $result = false;
        if($groupOnSever->password == $group->password){
            $result = true; 
        }
        return $result;
    }
    public function delete(Request $request){
        $result = "code_200";
        $group = Group::find($request->idGroup);
        if($group->passwordLevel2 == $request->password){
            $record = Record::find($request->idRecord);
            if($record->group_id == $group->id){
                Record::destroy($request->idRecord);
                $result = "code_100";
            }                 
        }else if($group->passwordLevel1 == $request->password){
            $result = "code_165";
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
        //
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
