@php($url = url()->full())
@php($user = Auth::user())
<ul id="sidebarnav">
    <li class="user-pro">
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <img src="{{ asset(Auth::user()->image) }}" alt="user-img" class="img-circle">
            <span class="hide-menu">{{ Auth::user()->name }}</span>
        </a>
        <ul aria-expanded="false" class="collapse">
            <li><a href="{{ route('user.profile.edit') }}"><i class="ti-user"></i> My Profile</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i> Logout
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false">
            <i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span>
        </a>
    </li>
    @can('roles-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('roles.index') }}" aria-expanded="false">
            <i class="icons-Control"></i><span class="hide-menu">Roles</span>
        </a>
    </li>
    @endcan
    @can('users-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('users.index') }}" aria-expanded="false">
            <i class="icons-Administrator"></i><span class="hide-menu">Users</span>
        </a>
    </li>
    @endcan
    @can('branch-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('branches.index') }}" aria-expanded="false">
            <i class="icons-Arrow-Fork"></i><span class="hide-menu">Branches</span>
        </a>
    </li>
    @endcan
    
    @can('client-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('clients.index') }}" aria-expanded="false">
            <i class="icon-people"></i><span class="hide-menu">Clients</span>
        </a>
    </li>
    @endcan
    @can('client-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('expenses.index') }}" aria-expanded="false">
            <i class="icons-Arrow-TurnRight"></i><span class="hide-menu">Expense</span>
        </a>
    </li>
    @endcan
    @can('branch-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('charges-types.index') }}" aria-expanded="false">
            <i class="icons-Remove"></i><span class="hide-menu">Charges Types</span>
        </a>
    </li>
    @endcan
    @can('branch-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('expense-types.index') }}" aria-expanded="false">
            <i class="icons-Remove"></i><span class="hide-menu">Expense Types</span>
        </a>
    </li>
    @endcan
    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="icon-docs"></i><span class="hide-menu">Report</span>
        </a>
        <ul aria-expanded="false" class="collapse">
            <li><a href="{{ route('reports.expense') }}">Expense</a></li>
            <li><a href="{{ route('reports.clients') }}">Clients</a></li>
        </ul>
    </li>
    <li>
        <a class="waves-effect waves-dark" href="{{ route('notifications.index') }}" aria-expanded="false">
            <i class="fas fa-bell"></i><span class="hide-menu">Notification</span>
        </a>
    </li>
    @can('settings-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('settings.index') }}" aria-expanded="false">
            <i class="ti-settings"></i><span class="hide-menu">Settings</span>
        </a>
    </li>
    @endcan
    @can('audit-list')
    <li>
        <a class="waves-effect waves-dark" href="{{ route('audit.index') }}" aria-expanded="false">
            <i class="icons-Time-Backup"></i><span class="hide-menu">Audits</span>
        </a>
    </li>
    @endcan
    @can('log-list') 
    <li>
        <a class="waves-effect waves-dark" href="{{ route('logs') }}" aria-expanded="false" target="_blank">
            <i class="icons-Calendar-4"></i><span class="hide-menu">Logs</span>
        </a>
    </li>
    @endcan
    <li>
        <a class="waves-effect waves-dark" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span>
        </a>
    </li>
</ul>
        