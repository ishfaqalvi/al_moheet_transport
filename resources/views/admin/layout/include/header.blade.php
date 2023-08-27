<div class="navbar-header">
    <a target="_blank" class="navbar-brand" href="{{ route('home') }}">
        <b>Logo Here
            <!-- Light Logo icon -->
            <!-- <img src="{{ asset('admin/images/logo.webp') }}" alt="homepage" class="light-logo" height="35px"/> -->
        </b>
    </a>
</div>
<div class="navbar-collapse">
    <ul class="navbar-nav me-auto">
        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
        <li class="nav-item">
            <form class="app-search d-none d-md-block d-lg-block">
                <input type="text" class="form-control" placeholder="Search & enter">
            </form>
        </li>
    </ul>
    <ul class="navbar-nav my-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                @if(auth()->user()->unreadNotifications->count() > 0)
                <div class="notify">
                    <span class="heartbit"></span>
                    <span class="point"></span> 
                </div>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
                <ul>
                    <li>
                        <div class="drop-title">Notifications</div>
                    </li>
                    <li>
                        <div class="message-center">
                            @foreach (auth()->user()->unreadNotifications as $notification)
                                <a href="javascript:void(0)">
                                    <div class="btn {{ $notification->data['color']}} btn-circle text-white">
                                        <i class="{{ $notification->data['icon']}}"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>{{ $notification->data['title']}}</h5> 
                                        <span class="mail-desc">{{ $notification->data['message']}}</span> 
                                        <span class="time">{{ $notification->created_at}}</span> 
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </li>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                    <li>
                        <a class="nav-link text-center link" href="{{ route('notifications.index')}}"> 
                            <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                    @else
                    <li>
                        <a class="nav-link text-center link">
                            <strong>Opps! You have read all.</strong>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        <li class="nav-item dropdown u-pro">
            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset(Auth::user()->image) }}" alt="user" class=""> 
                <span class="hidden-md-down">{{ Auth::user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> 
            </a>
            <div class="dropdown-menu dropdown-menu-end animated flipInY">
                <a href="{{ route('user.profile.edit') }}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        <li class="nav-item right-side-toggle">
            <a class="nav-link  waves-effect waves-light" href="javascript:void(0)">
                <i class="ti-settings"></i>
            </a>
        </li>
    </ul>
</div>