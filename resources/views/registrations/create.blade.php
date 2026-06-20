<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Event | EMS</title>

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

    <div class="flex min-h-screen">


        <x-sidebar />

        <main class="ml-72 min-h-screen w-[calc(100vw-18rem)] p-8">

            <!-- Back -->
            <a 
            href="{{ route('events.show', $event->id) }}"
                class="inline-flex items-center gap-2 text-[#276152] font-semibold mb-6">
                ← Back to Event
            </a>

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
                        <h1 class="text-4xl font-bold">
                            Event Registration
                        </h1>

                        <p class="text-[#cfd7d0] mt-3">
                            Confirm your participation in this event.
                        </p>
                    </div>

                    <div class="glass rounded-3xl p-6 text-[#0d3a35]">

                        <h3 class="font-bold">
                            Event Date
                        </h3>

                        <p class="mt-2">
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                        </p>

                    </div>

                </div>

            </section>

            <div class="grid xl:grid-cols-3 gap-8">

                <!-- Registration Form -->
                <div class="xl:col-span-2">

                    <div class="bg-white rounded-[32px] p-8 luxury-shadow">

                        <h2 class="text-2xl font-bold text-[#0d3a35] mb-6">
                            Registration Details
                        </h2>

                        <form action="{{ route('registrations.store') }}" method="POST" class="space-y-6">

                            @csrf

                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <div>
                                <label class="block text-sm font-medium mb-2">
                                    Event Name
                                </label>

                                <input type="text" value="{{ $event->name }}" disabled
                                    class="w-full border border-gray-200 rounded-2xl px-4 py-4 bg-gray-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2">
                                    Student Name
                                </label>

                                <input type="text" value="{{ $user->name ?? '' }}" disabled
                                    class="w-full border border-gray-200 rounded-2xl px-4 py-4 bg-gray-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2">
                                    Student Email
                                </label>

                                <input type="email" value="{{ $user->email ?? '' }}" disabled
                                    class="w-full border border-gray-200 rounded-2xl px-4 py-4 bg-gray-50">
                            </div>


                            <div class="flex items-start gap-3">

                                <input type="checkbox" required class="mt-1">

                                <p class="text-sm text-gray-600">
                                    I confirm that I want to participate in this
                                    event and agree to follow all event guidelines.
                                </p>

                            </div>

                            <button type="submit"
                                class="w-full bg-[#276152]
                               hover:bg-[#1f5144]
                               text-white
                               py-4 rounded-2xl
                               text-lg font-semibold transition">

                                Register for Event

                            </button>

                        </form>

                    </div>

                </div>

                <!-- Event Summary -->
                <div>

                    <div class="bg-white rounded-[32px] p-6 luxury-shadow">

                        <h2 class="text-xl font-bold text-[#0d3a35] mb-5">
                            Event Summary
                        </h2>

                        <div class="space-y-5">

                            <div>
                                <p class="text-gray-500">Event</p>
                                <p class="font-semibold">
                                    {{ $event->name }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Venue</p>
                                <p class="font-semibold">
                                    {{ $event->venue }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Date</p>
                                <p class="font-semibold">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
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

            </div>

        </main>

    </div>

</body>

</html>
