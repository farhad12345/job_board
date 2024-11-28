
    <body>
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="{{ url('admin/jobs') }}" class="{{ request()->is('admin/jobs*') ? 'active' : '' }}">Manage Jobs</a>
            <a href="{{ url('admin.users') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">Manage Users</a>
            <a href="{{ url('admin.applications') }}" class="{{ request()->is('admin/applications*') ? 'active' : '' }}">Manage Application</a>
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </body>
