<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | EMS</title>

    @vite(['resources/css/app.css'])

    <style>
        .luxury-shadow {
            box-shadow: 0 20px 60px rgba(13, 58, 53, 0.12);
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255,255,255,0.65);
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
                    Welcome Back 👋
                </h1>

                <p class="text-gray-500 mt-2">
                    Manage and organize your events efficiently.
                </p>
            </div>

            <div class="flex gap-4">

                <button class="bg-white w-14 h-14 rounded-2xl luxury-shadow">
                    🔔
                </button>

                <div class="bg-white px-6 py-4 rounded-2xl luxury-shadow">
                    Teacher
                </div>

            </div>

        </div>

        <!-- Hero -->
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
                        Event Management Center
                    </h2>

                    <p class="text-[#b1b7ab]">
                        3 Upcoming Events • 215 Registered Students
                    </p>
                </div>

                <div class="glass rounded-3xl p-6 text-[#0d3a35]">

                    <h3 class="font-bold">
                        Performance
                    </h3>

                    <div class="mt-4 space-y-2">
                        <p>Events Organized: 32</p>
                        <p>Attendance: 91%</p>
                    </div>

                </div>

            </div>

        </section>

        <!-- Stats -->
        <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                <p class="text-gray-500">Events</p>
                <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">{{$event_count}}</h2>
            </div>

            <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                <p class="text-gray-500">Participants</p>
                <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">1260</h2>
            </div>

            <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                <p class="text-gray-500">Pending</p>
                <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">8</h2>
            </div>

            <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                <p class="text-gray-500">Certificates</p>
                <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">560</h2>
            </div>

        </section>

        <!-- Content Grid -->
        <section class="grid xl:grid-cols-3 gap-8">

            <!-- Upcoming Events -->
            <div class="xl:col-span-2 bg-white rounded-[32px] p-6 luxury-shadow">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold text-[#0d3a35]">
                        Upcoming Events
                    </h2>

                    <a href="{{route('events.index')}}" class="bg-[#276152] text-white px-5 py-3 rounded-xl">
                        View All
                    </a>

                </div>


                
                <div class="space-y-5">
                    @foreach($events as $event)
                    <div class="border rounded-3xl overflow-hidden">
                        <div class="h-2 bg-[#276152]"></div>

                        <div class="p-5">
                            <h3 class="font-bold text-xl">
                                {{$event->name}}
                            </h3>

                            <p class="text-gray-500 mt-2">
                                {{\Carbon\Carbon::parse($event->date)->format('d/m/y')}} • {{$event->venue}}
                            </p>

                            <p class="mt-3">
                                152 Students Registered
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-[32px] p-6 luxury-shadow">

                <h2 class="text-2xl font-bold text-[#0d3a35] mb-6">
                    Quick Actions
                </h2>

                <div class="grid grid-cols-2 gap-4">

                    <a href="{{route('events.create')}}" class="bg-[#276152] text-white p-5 rounded-3xl"
                    >Create Event</a>

                    <button class="bg-[#0d3a35] text-white p-5 rounded-3xl">
                        Attendance
                    </button>

                    <button class="bg-[#276152] text-white p-5 rounded-3xl">
                        Reports
                    </button>

                    <button class="bg-[#0d3a35] text-white p-5 rounded-3xl">
                        Certificates
                    </button>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>

