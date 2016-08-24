<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Laravel Authentication Demo</title>
    
</head>
<body>
    <div id="container">
        <div id="nav">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                @if(Auth::check())
                    <li><a href="{{URL::to('profile')}}">Profile</a></li>
                    <li><a href="{{URL::to('addressbook')}}">addressbook</a></li>
					 <li><a href="{{URL::to('upload')}}">addressbook</a></li>
                    <li><a href="{{URL::to('logout')}}">Logout ({{Auth::user()->username}})</a> </li>
                @else
                    <li><a href="{{URL::to('login')}}">Login</a></li>
                @endif
            </ul>
        </div><!-- end nav -->

        <!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
            <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
        @endif

        @yield('content')
    </div><!-- end container -->
</body>
</html>