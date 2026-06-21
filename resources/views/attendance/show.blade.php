<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance | EMS</title>

    @vite(['resources/css/app.css'])

    <style>
        .luxury-shadow {
            box-shadow: 0 20px 60px rgba(13, 58, 53, .12);
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, .65);
        }
    </style>

</head>

<body class="bg-[#fbf6f0]">
    {{-- {{dd($attendance)}} --}}
    <div class="flex min-h-screen">

        <x-sidebar />

        <main class="ml-72 min-h-screen w-[calc(100vw-18rem)] p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">

                <div>
                    <h1 class="text-4xl font-bold text-[#0d3a35]">
                        Mark Attendance
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Manage attendance for registered students.
                    </p>
                </div>

                <a href="{{ route('attendance.index') }}" class="bg-white px-6 py-4 rounded-2xl luxury-shadow">
                    ← Back
                </a>

            </div>

            <!-- Event Hero -->
            <section
                class="bg-gradient-to-r from-[#0d3a35] to-[#276152]
               rounded-[32px]
               p-8
               text-white
               luxury-shadow
               mb-8">

                <div class="flex justify-between items-center">

                    <div>

                        <h2 class="text-4xl font-bold mb-3">
                            {{ $event->name }}
                        </h2>

                        <p class="text-[#cfd8d4]">
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                            • {{ $event->venue }}
                        </p>

                    </div>

                    <div class="glass rounded-3xl p-6 text-[#0d3a35]">

                        <h3 class="font-bold">
                            Event Details
                        </h3>

                        <div class="mt-4 space-y-2">
                            <p>Registered Students: {{ $registrations->count() }}</p>
                            <p>Attendance Session Open</p>
                        </div>

                    </div>

                </div>

            </section>

            <!-- Stats -->
            <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

                <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                    <p class="text-gray-500">Registered</p>
                    <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">
                        {{ $registrations->count() }}
                    </h2>
                </div>

                <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                    <p class="text-gray-500">Present</p>
                    <h2 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $presentCount ?? 0 }}
                    </h2>
                </div>

                <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                    <p class="text-gray-500">Absent</p>
                    <h2 class="text-4xl font-bold text-red-500 mt-2">
                        {{ $absentCount ?? 0 }}
                    </h2>
                </div>

                <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                    <p class="text-gray-500">Not Marked</p>
                    <h2 class="text-4xl font-bold text-amber-500 mt-2">
                        {{ $notMarkedCount ?? 0 }}
                    </h2>
                </div>

            </section>

            <!-- Attendance Table -->
            <section class="bg-white rounded-[32px] p-6 luxury-shadow">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold text-[#0d3a35]">
                        Registered Students
                    </h2>

                </div>

                <form action="{{ route('attendance.store', $event->id) }}" method="POST">

                    @csrf

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="border-b">

                                    <th class="text-left py-4 text-[#0d3a35]">
                                        Student
                                    </th>

                                    <th class="text-left py-4 text-[#0d3a35]">
                                        Roll No
                                    </th>

                                    <th class="text-left py-4 text-[#0d3a35]">
                                        Email
                                    </th>

                                    <th class="text-center py-4 text-[#0d3a35]">
                                        Present
                                    </th>

                                    <th class="text-center py-4 text-[#0d3a35]">
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($registrations as $registration)
                                    {{-- @php

                            $attendance = $registration->student
                                ->attendances()
                                ->where('event_id',$event->id)
                                ->first();

                            $status = $attendance->attendance_status ?? 'not_marked';

                        @endphp --}}

                                    <tr class="border-b hover:bg-[#faf8f5]">

                                        <td class="py-5">
                                            <div class="font-semibold text-[rgb(13,58,53)]">
                                                {{ $registration->student->user->name }}
                                            </div>
                                        </td>

                                        <td class="py-5">
                                            {{ $registration->student->roll_no }}
                                        </td>

                                        <td class="py-5">
                                            {{ $registration->student->user->email }}
                                        </td>

                                        <td class="text-center py-5">
                                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                                            <input type="checkbox" name="attendance[]"
                                                value="{{ $registration->student_id }}"
                                                {{ ($attendance[$registration->student_id] ?? '') == 'present' ? 'checked' : '' }}>

                                        </td>

                                        <td class="text-center py-5">

                                            @if (($attendance[$registration->student_id] ?? null) == 'present')
                                                <span
                                                    class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                                    Present
                                                </span>
                                            @elseif(($attendance[$registration->student_id] ?? null) == 'absent')
                                                <span
                                                    class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-semibold">
                                                    Absent
                                                </span>
                                            @else
                                                <span
                                                    class="bg-amber-100 text-amber-700 px-4 py-2 rounded-full text-sm font-semibold">
                                                    Not Marked
                                                </span>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    <div class="flex justify-end mt-8">

                        <button type="submit"
                            class="bg-[#276152]
                           hover:bg-[#0d3a35]
                           text-white
                           px-6
                           py-4
                           rounded-2xl
                           font-semibold
                           transition">

                            Save Attendance

                        </button>

                    </div>

                </form>

            </section>

        </main>

    </div>

</body>

</html>
