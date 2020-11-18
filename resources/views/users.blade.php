@extends('app')

@section('content')
	Welcome {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} (<a href="/logout">logout</a>)

	<div id="app">
	    <users-component 
	    	:users="{{ json_encode($users) }}"
	    ></users-component>
	</div>

@endsection