@extends('layout')
@section('content')
<h1>All Upload</h1>

<p><a href="{{URL::to('upload/create')}}">Upload</a></p>

@if ($upload->count())
   
            @foreach ($upload as $up)

                <li>
                    


                    @if($up->parent_id)
                        --@if($up->type == 'folder')
                            <img src="img/folder.png">
                        @else
                            <img src="img/file.png">
                        @endif  
                        {{ $up->path }}
                    @else
                    @if($up->type == 'folder')
                            <img src="img/folder.png">
                        @else
                            <img src="img/file.png">
                    @endif  
                    {{ $up->type }}
                    {{ $up->path }}
                    @endif
                </li>
                
            @endforeach
            
@else
    There are no file
@endif

@stop