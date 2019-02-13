@if(!Auth::check())
    @if(Route::currentRouteName() == 'home')
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link active"><i class="fa fa-home"></i> Schedule</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer') }}" class="nav-link"><i class="fa fa-user-tie"></i> Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.dashboard') }}" class="nav-link"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    </li>
    @elseif(Route::currentRouteName() == 'lecturer')
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i> Schedule</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer') }}" class="nav-link active"><i class="fa fa-user-tie"></i> Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.dashboard') }}" class="nav-link"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    </li>
    @else
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i> Schedule</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer') }}" class="nav-link"><i class="fa fa-user-tie"></i> Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.dashboard') }}" class="nav-link active"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    </li>
    @endif
@else
    @if(Route::currentRouteName() == 'home')
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link active"><i class="fa fa-home"></i> Schedule</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer') }}" class="nav-link"><i class="fa fa-user-tie"></i> Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.dashboard') }}" class="nav-link"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer.dashboard') }}" class="nav-link"><i class="fa fa-users-cog"></i> Cofigure Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </li>
    @elseif(Route::currentRouteName() == 'lecturer.dashboard')
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i> Schedule</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer') }}" class="nav-link"><i class="fa fa-user-tie"></i> Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.dashboard') }}" class="nav-link"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer.dashboard') }}" class="nav-link active"><i class="fa fa-users-cog"></i> Cofigure Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </li>
    @elseif(Route::currentRouteName() == 'lecturer')
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i> Schedule</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer') }}" class="nav-link active"><i class="fa fa-user-tie"></i> Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.dashboard') }}" class="nav-link"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer.dashboard') }}" class="nav-link"><i class="fa fa-users-cog"></i> Cofigure Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </li>
    @else
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i> Schedule</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer') }}" class="nav-link"><i class="fa fa-user-tie"></i> Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.dashboard') }}" class="nav-link active"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('lecturer.dashboard') }}" class="nav-link"><i class="fa fa-users-cog"></i> Cofigure Dosen</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </li>
    @endif
@endif