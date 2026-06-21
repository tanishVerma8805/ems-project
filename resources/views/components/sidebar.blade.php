<aside
    class="fixed top-0 left-0 h-screen w-72 bg-[#0d3a35] text-white flex flex-col p-3 z-50 shadow-2xl">

    <!-- Logo -->
    <div class="mb-10">
        <h1 class="text-3xl font-bold tracking-wide">
            EMS
        </h1>

        {{-- @php
            $role = 
        @endphp --}}
        @if(auth()->user()->hasRole('teacher'))
            <p class="text-[#b1b7ab] text-sm">
                Teacher Dashboard
            </p>
        @elseif(auth()->user()->hasRole('student'))
             <p class="text-[#b1b7ab] text-sm">
                Student Dashboard
            </p>

        @elseif(auth()->user()->hasRole('admin'))
            <p class="text-[#b1b7ab] text-sm">
                Admin Dashboard
            </p>
        @endif
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 flex-1">

        <a href="{{ route('dashboard.teacher') }}"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl transition
           {{ request()->routeIs('dashboard.teacher') ? 'bg-[#276152]' : 'hover:bg-[#276152]/30' }}">
            <span>🏠</span>
            Dashboard
        </a>

        <a href="{{ route('events.index') }}"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl transition
           {{ request()->routeIs('events.*') ? 'bg-[#276152]' : 'hover:bg-[#276152]/30' }}">
            <span>🎉</span>
            Events
        </a>

        <a href="{{ route('registrations.index') }}"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl transition
           {{ request()->routeIs('registrations.*') ? 'bg-[#276152]' : 'hover:bg-[#276152]/30' }}">
            <span>👥</span>
            Registrations
        </a>

        <a href="{{ route('attendance.index') }}"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl transition
           {{ request()->routeIs('attendance.*') ? 'bg-[#276152]' : 'hover:bg-[#276152]/30' }}">
            <span>✅</span>
            Attendance
        </a>

        <a href="#"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-[#276152]/30 transition">
            <span>🏆</span>
            Certificates
        </a>

        <a href="#"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-[#276152]/30 transition">
            <span>📅</span>
            Calendar
        </a>

        <a href="#"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-[#276152]/30 transition">
            <span>📊</span>
            Reports
        </a>

        <a href="{{route('logout')}}"
           class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-[#276152]/30 transition">
            <span>🚪</span>
            Logout
        </a>
    </nav>

</aside>
