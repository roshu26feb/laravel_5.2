@extends('layout')
@section('content')
<h1>Create Address Book</h1>

<form method="POST" action="{{URL::to('addressbook')}}">
    <ul>

        <li>
           <label>address_book_title</label>
           <input type="text" name="address_book_title">
        </li>

        <li>
             <label>contact_person_name</label>
           <input type="text" name="contact_person_name">
        </li>

        <li>
            <label>contact_person_number</label>
           <input type="text" name="contact_person_number">
        </li>

        <li>
            <label>address_line1</label>
           <input type="text" name="address_line1">
        </li>        

        <li>
             <label>address_line2</label>
           <input type="text" name="address_line2">
        </li>

        <li>
             <label>address_line3</label>
           <input type="text" name="address_line3">
        </li>

        <li>
             <label>pincode</label>
           <input type="text" name="pincode">
        </li>

        <li>
             <label>city</label>
           <input type="text" name="city">
        </li>

        <li>
             <label>state</label>
           <input type="text" name="state">
        </li>

        <li>
             <label>country</label>
           <input type="text" name="country">
        </li>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <li>
            <input type="submit" value="create">
        </li>
    </ul>
</form>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop