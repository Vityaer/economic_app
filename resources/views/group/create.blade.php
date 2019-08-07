@extends('layouts.app')

@section('content')

	<form action="{{route('group.store')}}" method="post">
		@csrf
		<input type="text" name="name"/>
		<input type="submit"/>
	</form>

@endsection