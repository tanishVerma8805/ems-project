<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Registrations | EMS</title>

    @vite(['resources/css/app.css'])

    <style>
        .luxury-shadow{
            box-shadow: 0 20px 60px rgba(13,58,53,.12);
        }

        .glass{
            backdrop-filter: blur(20px);
            background: rgba(255,255,255,.65);
        }
    </style>
</head>

<body class="bg-[#fbf6f0]">
{{-- {{dd($registrations)}} --}}
<div class="flex min-h-screen">

    <x-sidebar />

    <main class="ml-72 min-h-screen w-[calc(100vw-18rem)] p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-4xl font-bold text-[#0d3a35]">
                    My Registrations
                </h1>

                <p class="text-gray-500 mt-2">
                    View all events you have registered for.
                </p>
            </div>

            <a
                href="{{ route('events.index') }}"
                class="bg-[#276152] text-white px-6 py-4 rounded-2xl luxury-shadow">

                Browse Events

            </a>

        </div>

        <!-- Hero -->
        <section
            class="bg-gradient-to-r
                   from-[#0d3a35]
                   to-[#276152]
                   rounded-[32px]
                   p-8
                   text-white
                   luxury-shadow
                   mb-8">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-4xl font-bold">
                        Registration Overview
                    </h2>

                    <p class="text-[#cfd7d0] mt-3">
                        Track your event participation and attendance.
                    </p>

                </div>

                <div class="glass rounded-3xl p-6 text-[#0d3a35]">

                    <h3 class="font-bold">
                        Registered Events
                    </h3>

                    <p class="text-4xl font-bold mt-3">
                        {{ $registrations->count() }}
                    </p>

                </div>

            </div>

        </section>

        <!-- Stats -->
        <section class="grid md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white p-6 rounded-[28px] luxury-shadow">
                <p class="text-gray-500">Total Registrations</p>
                <h2 class="text-4xl font-bold text-[#0d3a35] mt-2">
                    {{ $registrations->count() }}
                </h2>
            </div>

        </section>

        <!-- Registrations -->
        <section
            class="bg-white
                   rounded-[32px]
                   p-6
                   luxury-shadow">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-[#0d3a35]">
                    Registered Events
                </h2>

                <span class="text-gray-500">
                    {{ $registrations->count() }} Events
                </span>

            </div>

            <div class="space-y-5">

                @forelse($registrations as $registration)

                <div
                    class="border border-gray-100
                           rounded-3xl
                           overflow-hidden">

                    <div class="h-2 bg-[#276152]"></div>

                    <div class="p-6">

                        <div class="flex justify-between items-start">

                            <div>

                                <h3 class="text-xl font-bold">
                                    {{ $registration->event->name }}
                                </h3>

                                <p class="text-gray-500 mt-2">
                                    📅
                                    {{ \Carbon\Carbon::parse($registration->event->date)->format('d M Y') }}
                                </p>

                                <p class="text-gray-500 mt-1">
                                    📍
                                    {{ $registration->event->venue }}
                                </p>

                            </div>


                        </div>

                        <div class="flex gap-3 mt-6">

                            <a
                                href="{{ route('events.show', $registration->event) }}"
                                class="bg-[#276152] text-white px-5 py-3 rounded-xl">

                                View Event

                            </a>

                            @if($registration->certificate_issued)

                            <button
                                class="bg-[#0d3a35] text-white px-5 py-3 rounded-xl">

                                Certificate Available

                            </button>

                            @endif

                        </div>

                    </div>

                </div>

                @empty

                <div class="text-center py-20">

                    <div class="text-6xl mb-4">
                        🎫
                    </div>

                    <h3 class="text-2xl font-bold text-[#0d3a35]">
                        No Registrations Yet
                    </h3>

                    <p class="text-gray-500 mt-3">
                        You haven't registered for any events.
                    </p>

                    <a
                        href="{{ route('events.index') }}"
                        class="inline-block mt-6 bg-[#276152] text-white px-6 py-4 rounded-2xl">

                        Explore Events

                    </a>

                </div>

                @endforelse

            </div>

        </section>

    </main>

</div>

</body>
</html>