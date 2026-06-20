<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->name }} | EMS</title>

    @vite(['resources/css/app.css'])

    <style>
        .luxury-shadow {
            box-shadow: 0 20px 60px rgba(13, 58, 53, 0.12);
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, .65);
        }
    </style>
</head>

<body class="bg-[#fbf6f0]">

    <div class="flex min-h-screen">

        <x-sidebar />

        <main class="ml-72 min-h-screen w-[calc(100vw-18rem)] p-8">

            <!-- Back Button -->
            {{-- <a href="{{ route('events.index') }}"
           class="inline-flex items-center gap-2 text-[#276152] font-semibold mb-6">
            ← Back to Events
        </a> --}}

            <!-- Hero Section -->
            <section
                class="bg-gradient-to-r
                   from-[#0d3a35]
                   to-[#276152]
                   rounded-[32px]
                   p-10
                   text-white
                   luxury-shadow
                   mb-8">

                <div class="flex justify-between items-start">

                    <div>

                        <span class="bg-white/20 px-4 py-2 rounded-xl text-sm">
                            Upcoming Event
                        </span>

                        <h1 class="text-5xl font-bold mt-5">
                            {{ $event->name }}
                        </h1>

                        <p class="text-[#cfd7d0] mt-4 text-lg">
                            Join us for an exciting event and enhance your learning experience.
                        </p>

                    </div>

                    <div class="glass rounded-3xl p-6 text-[#0d3a35]">

                        <h3 class="font-bold mb-3">
                            Event Summary
                        </h3>

                        <div class="space-y-2">
                            <p>📅 {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
                            <p>📍 {{ $event->venue }}</p>
                            {{-- <p>👥 {{$event->capacity ?? 200}} Seats</p> --}}
                        </div>

                    </div>

                </div>

            </section>

            <!-- Details Grid -->
            <section class="grid xl:grid-cols-3 gap-8">

                <!-- Main Content -->
                <div class="xl:col-span-2 space-y-8">

                    <!-- Description -->
                    <div class="bg-white rounded-[32px] p-8 luxury-shadow">

                        <h2 class="text-2xl font-bold text-[#0d3a35] mb-5">
                            About This Event
                        </h2>

                        <div class="text-gray-700 leading-8">
                            {!! nl2br(e($event->description)) !!}
                        </div>

                    </div>

                    <!-- Schedule -->
                    <div class="bg-white rounded-[32px] p-8 luxury-shadow">

                        <h2 class="text-2xl font-bold text-[#0d3a35] mb-5">
                            Event Schedule
                        </h2>

                        <div class="space-y-4">

                            <div class="flex gap-4">
                                <div class="w-3 h-3 rounded-full bg-[#276152] mt-2"></div>
                                <p>Registration & Check-In</p>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-3 h-3 rounded-full bg-[#276152] mt-2"></div>
                                <p>Opening Session</p>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-3 h-3 rounded-full bg-[#276152] mt-2"></div>
                                <p>Workshops & Activities</p>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-3 h-3 rounded-full bg-[#276152] mt-2"></div>
                                <p>Certificate Distribution</p>
                            </div>

                        </div>

                    </div>

                    <!-- Benefits -->
                    <div class="bg-white rounded-[32px] p-8 luxury-shadow">

                        <h2 class="text-2xl font-bold text-[#0d3a35] mb-5">
                            Why Participate?
                        </h2>

                        <div class="grid md:grid-cols-2 gap-4">

                            <div class="bg-[#fbf6f0] rounded-2xl p-5">
                                🎓 Skill Development
                            </div>

                            <div class="bg-[#fbf6f0] rounded-2xl p-5">
                                🤝 Networking Opportunities
                            </div>

                            <div class="bg-[#fbf6f0] rounded-2xl p-5">
                                📜 Certificate of Participation
                            </div>

                            <div class="bg-[#fbf6f0] rounded-2xl p-5">
                                🏆 Recognition & Rewards
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Sidebar -->
                <div class="space-y-8">

                    <!-- Event Info -->
                    <div class="bg-white rounded-[32px] p-6 luxury-shadow">

                        <h2 class="text-xl font-bold text-[#0d3a35] mb-5">
                            Event Information
                        </h2>

                        <div class="space-y-5">

                            <div>
                                <p class="text-gray-500">Date</p>
                                <p class="font-semibold">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Venue</p>
                                <p class="font-semibold">
                                    {{ $event->venue }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Organizer</p>
                                <p class="font-semibold">
                                    {{ $event->organised_by }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Registration Fee</p>
                                <p class="font-semibold text-green-600">
                                    Free
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <!-- Registration CTA -->
            <section
                class="mt-8
                   bg-white
                   rounded-[32px]
                   p-8
                   luxury-shadow">

                <div class="flex flex-col md:flex-row items-center justify-between">

                    <div>

                        <h2 class="text-3xl font-bold text-[#0d3a35]">
                            Ready to Join?
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Register now and secure your spot before seats fill up.
                        </p>

                    </div>

                    @if ($isRegistered)
                        <button disabled
                            class="bg-gray-400
               cursor-not-allowed
               text-white
               px-10
               py-4
               rounded-2xl
               text-lg
               font-semibold">

                            ✓ Already Applied

                        </button>
                    @else
                        <a href="{{ route('registrations.create', $event->id) }}"
                            class="bg-[#276152]
               hover:bg-[#1f5144]
               text-white
               px-10
               py-4
               rounded-2xl
               text-lg
               font-semibold
               transition">

                            Apply for Event

                        </a>
                    @endif

                    </form>

                </div>

            </section>

        </main>

    </div>

</body>

</html>
