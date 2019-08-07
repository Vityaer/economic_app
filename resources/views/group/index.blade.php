@extends('layouts.app')

@section('content')

<h1>Groups</h1>
	@foreach ($groups as $group)
		<div> <a href="{{ route('group.show', ['id' => $group->id]) }}"> {{$group->name}} </a> </div>
	@endforeach	
@endsection