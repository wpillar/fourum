<div class="container">

    <div class="row">
        <div class="col-md-9">
            <h1><a href="{{ url('/') }}">{{ $forumName }}</a></h1>
        </div>
        <div class="col-md-1">
            @if (Auth::check() && $user)
            {{ Gravatar::image($user->getEmail(), '', array('width' => 60, 'height' => 60, 'style' => 'margin-top:9px')) }}
            @endif
        </div>
        <div class="col-md-2">
            @if (Auth::check() && $user)
            <h4 style="margin-top:20px;">{{ $user->getUsername() }}</h4>
            <ul class="small-nav">
                <li><a href="{{ url('user/profile/' . $user->getUsername()) }}">Profile</a></li>
                <li><a href="{{ url('auth/logout') }}">Logout</a></li>
            </ul>
            @else
            <h4 style="margin-top:20px"><a href="{{ url('register') }}">Create Account</a></h4>
            @endif
        </div>
    </div>
