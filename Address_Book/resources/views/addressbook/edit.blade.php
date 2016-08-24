
@extends('layout')
@section('content')

<h1>Edit User</h1>
<Form method="POST" action="{{URL::to('addressbook/').'/'.$address->id}}">

    <ul>
        <li>
            <label>address_book_title</label>
            <input type="text" name="address_book_title" value="{{$address->address_book_title}}">
        </li>
        <li>
             <label>contact_person_name</label>
            <input type="text" name="contact_person_name" value="{{$address->contact_person_name}}">
        </li>
        <li>
             <label>contact_person_number</label>
            <input type="text" name="contact_person_number" value="{{$address->contact_person_number}}" >
        </li>
        <li>
             <label>address_line1</label>
            <input type="text" name="address_line1" value="{{$address->address_line1}}">
        </li>
        <li>
             <label>address_line2</label>
            <input type="text" name="address_line2" value="{{$address->address_line2}}">
        </li>
        <li>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" value="submit" >  
        </li>
    </ul>
</form>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop