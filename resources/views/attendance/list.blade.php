<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management | EMS</title>

    @vite(['resources/css/app.css'])

    <style>
        .luxury-shadow {
            box-shadow: 0 20px 60px rgba(13, 58, 53, 0.12);
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.65);
        }
    </style>

</head>

<body class="bg-[#fbf6f0]">

    <div class="flex min-h-screen">

        <x-sidebar />

        <!-- Main Content -->
        <main class="ml-72 min-h-screen w-[calc(100vw-18rem)] p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">

                <div>
                    <h1 class="text-4xl font-bold text-[#0d3a35]">
                        Attendance Management
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Select an event to mark and manage attendance.
                    </p>
                </div>

                <div class="flex gap-4">

                    <button class="bg-white w-14 h-14 rounded-2xl luxury-shadow">
                        📋
                    </button>

                    <div class="bg-white px-6 py-4 rounded-2xl luxury-shadow">
                        Teacher
                    </div>

                </div>

            </div>

            <!-- Hero Section -->
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
                            Attendance Control Center
                        </h2>

                        <p class="text-[#cfd8d4]">
                            Quickly manage attendance for all upcoming and completed events.
                        </p>
                    </div>

                    <div class="glass rounded-3xl p-6 text-[#0d3a35]">

                        <h3 class="font-bold">
                            Overview
                        </h3>

                        <div class="mt-4 space-y-2">
                            <p>Total Events: {{ $events->count() }}</p>
                            <p>Attendance Tracking Enabled</p>
                        </div>

                    </div>

                </div>

            </section>

            <!-- Stats -->
            <section class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">

                <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                    <p class="text-gray-500">Events</p>
                    <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">
                        {{ $events->count() }}
                    </h2>
                </div>

                <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                    <p class="text-gray-500">Attendance Records</p>
                    <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">
                        {{$totalRecords}}
                    </h2>
                </div>

                <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                    <p class="text-gray-500">Present Rate</p>
                    <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">
                       {{$presentRate}}%
                    </h2>
                </div>


            </section>

            <!-- Events -->
            <section class="bg-white rounded-[32px] p-6 luxury-shadow">

                <div class="flex justify-between items-center mb-6">

                    <div>
                        <h2 class="text-2xl font-bold text-[#0d3a35]">
                            Events List
                        </h2>

                        <p class="text-gray-500 mt-1">
                            Choose an event to mark attendance.
                        </p>
                    </div>

                </div>

                <div class="space-y-5">

                    @forelse($events as $event)
                        <div class="border border-[#edf0ee] rounded-3xl overflow-hidden hover:shadow-lg transition">

                            <div class="h-2 bg-[#276152]"></div>

                            <div class="p-6">

                                <div class="flex justify-between items-center">

                                    <div>

                                        <h3 class="font-bold text-2xl text-[#0d3a35]">
                                            {{ $event->name }}
                                        </h3>

                                        <p class="text-gray-500 mt-2">
                                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                            • {{ $event->venue }}
                                        </p>

                                    </div>

                                    <span class="bg-[#edf6f3] text-[#276152] px-4 py-2 rounded-full font-medium">
                                        Event
                                    </span>

                                </div>

                                <div class="mt-6 flex justify-between items-center">

                                    <div>
                                        <p class="text-gray-500">
                                            Ready for attendance tracking
                                        </p>
                                    </div>

                                    <a 
                                    href="{{ route('attendance.show', $event->id) }}"
                                        class="bg-[#276152]
                                      hover:bg-[#0d3a35]
                                      text-white
                                      px-6
                                      py-3
                                      rounded-2xl
                                      font-semibold
                                      transition-all">

                                        Mark Attendance

                                    </a>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-20">

                            <h3 class="text-2xl font-bold text-[#0d3a35]">
                                No Events Found
                            </h3>

                            <p class="text-gray-500 mt-3">
                                Create an event to start attendance management.
                            </p>

                        </div>
                    @endforelse

                </div>

            </section>

        </main>

    </div>

</body>

</html>
