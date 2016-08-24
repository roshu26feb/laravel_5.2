@extends('layout')
@section('content')
<h1>All Address</h1>

<p><a href="{{URL::to('addressbook/create')}}">Create Address</a></p>

@if ($address->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>address_book_title</th>
                <th>contact_person_name</th>
                <th>contact_person_number</th>
                <th>address_line1</th>
                <th>address_line2</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($address as $ad)
                <tr>
                    <td>{{ $ad->address_book_title }}</td>
                      <td>{{ $ad->contact_person_name }}</td>
                      <td>{{ $ad->contact_person_number }}</td>
                      <td>{{ $ad->address_line1 }}</td>
                      <td>{{ $ad->address_line2 }}</td>
                    <td><a href="{{URL::to('addressbook/').'/'.$ad->id}}">Edit</a>
                    
                    <td>
                        <form method="post" action="{{URL::to('daddressbook/').'/'.$ad->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<!--<input type="hidden" name="_method" value="PUT">-->
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    There are no address
@endif

@stop