@extends('layout')

@section('content')
    <h1>Login</h1>

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif

    
	<form name="login" method="POST">
    <!-- username field -->
    <p>
        <label>Username</label><br/>
        <input type="text" name="username">
    </p>

    <!-- password field -->
    <p>
		<label>password</label><br/>
        <input type="password" name="password">
    </p>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <!-- submit button -->
    <p>	  <input type="submit" name="Login"></p>

@stop