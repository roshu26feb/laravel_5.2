@extends('layout')
@section('content')
<h1>Give URL</h1>

<form method="POST" action="{{URL::to('upload')}}">
    
   <input type="text" name="url_path" >
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <input type="submit" value="upload">
</form>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop