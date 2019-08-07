@extends('layouts.app')

@section('content')

	<form action="{{route('record.store')}}" method="post">
		<input type="text" name="comment"/>
		<input type="text" name="type">
		<select name="group_id">
			@foreach($groups as $group)
				<option value="{{ $group->id }}">{{ $group->name }}</option> 
			@endforeach
		</select>
		<input type="submit"/>
	</form>

@endsection