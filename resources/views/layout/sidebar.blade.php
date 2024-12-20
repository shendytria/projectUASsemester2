<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i><img class="rounded-circle" src="{{ asset('img/Logo-Branding-UNAIR-biru.png') }}"
                        alt="" style="width: 85px; height: 85px;"></i></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('img/meh.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->nama_user }}</h6>
                <span>{{ Auth::user()->id_jenis_user }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            @if (Auth::user()->id_jenis_user == 'admin')
                <a href="/users" class="nav-item nav-link {{ request()->is('users') ? 'active' : '' }} }}"><i
                        class="fa fa-th me-2"></i>Users</a>
                <a href="/users-activity"
                    class="nav-item nav-link {{ request()->is('users-activity') ? 'active' : '' }} }}"><i
                        class="fa fa-keyboard me-2"></i>Users Activity</a>
                <a href="/errors-log" class="nav-item nav-link {{ request()->is('errors-log') ? 'active' : '' }} }}"><i
                        class="fa fa-table me-2"></i>Errors Log</a>
            @elseif (Auth::user()->id_jenis_user == 'user')
                <a href="/dashboard" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }} }}"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            @endif
        </div>
</div>
</nav>
</div>
