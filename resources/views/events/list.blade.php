<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | EMS</title>

    @vite(['resources/css/app.css'])

    <style>
        .luxury-shadow {
            box-shadow: 0 20px 60px rgba(13, 58, 53, 0.12);
        }
    </style>
</head>
<body class="bg-[#fbf6f0]">

    <x-sidebar />

    <main class="ml-72 min-h-screen p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-4xl font-bold text-[#0d3a35]">
                    Events
                </h1>

                <p class="text-gray-500 mt-2">
                    Manage all your organized events.
                </p>
            </div>

            <a href="{{ route('events.create') }}"
               class="bg-[#276152] text-white px-6 py-3 rounded-2xl hover:bg-[#0d3a35] transition">

                + Create Event

            </a>

        </div>

        <!-- Hero Banner -->
        <div
            class="bg-gradient-to-r from-[#0d3a35] to-[#276152]
                   rounded-[32px]
                   p-8
                   text-white
                   luxury-shadow
                   mb-8">

            <h2 class="text-3xl font-bold">
                Event Management
            </h2>

            <p class="text-[#b1b7ab] mt-2">
                View, manage, and monitor all event activities.
            </p>

        </div>

        <!-- Event Listing -->
        @if($events->count())

            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-6">

                @foreach($events as $event)

                    <div
                        class="bg-white rounded-[32px]
                               overflow-hidden
                               luxury-shadow
                               hover:-translate-y-1
                               transition-all duration-300">

                        <!-- Top Accent -->
                        <div class="h-2 bg-[#276152]"></div>

                        <div class="p-6">

                            <div class="flex justify-between items-start">

                                <div>
                                    <h3 class="text-xl font-bold text-[#0d3a35]">
                                        {{ $event->name }}
                                    </h3>

                                    <p class="text-sm text-[#276152] mt-1">
                                        {{ ucfirst($event->type) }}
                                    </p>
                                </div>

                                <span
                                    class="bg-[#fbf6f0]
                                           text-[#0d3a35]
                                           px-3 py-1
                                           rounded-full
                                           text-xs
                                           font-medium">

                                    {{ \Carbon\Carbon::parse($event->date)->format("d/m/y") }}

                                </span>

                            </div>

                            <p class="text-gray-600 mt-4 line-clamp-3">
                                {!! nl2br(e($event->description)) !!}
                            </p>

                            <div class="mt-6 space-y-2">

                                <div class="flex justify-between">
                                    <span class="text-gray-500">
                                        Organised By
                                    </span>

                                    <span class="font-medium text-[#0d3a35]">
                                        {{ $event->organised_by }}
                                    </span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-gray-500">
                                        Time
                                    </span>

                                    <span class="font-medium text-[#0d3a35]">
                                        {{ $event->time }}
                                    </span>
                                </div>

                            </div>

                            <div class="flex gap-3 mt-6">

                                <a href="{{route('events.show',$event->id)}}"
                                   class="flex-1 text-center bg-[#276152] text-white py-3 rounded-2xl hover:bg-[#0d3a35] transition"
                                   >

                                    View

                                </a>

                                <a href="{{route('events.edit',$event->id)}}"
                                   class="flex-1 text-center border border-[#b1b7ab] text-[#0d3a35] py-3 rounded-2xl hover:bg-[#fbf6f0] transition">

                                    Edit

                                </a>

                            </div>

                        </div>
                
                    </div>

                @endforeach
                    <div>
                        {{$events->links()}}
                    </div>
            </div>

        @else

            <!-- Empty State -->

            <div
                class="bg-white rounded-[32px]
                       luxury-shadow
                       p-8
                       text-center">

                <div class="text-7xl mb-6">
                    🎉
                </div>

                <h2 class="text-3xl font-bold text-[#0d3a35]">
                    No Events Found
                </h2>

                <p class="text-gray-500 mt-3 max-w-md mx-auto">
                    You haven't created any events yet.
                    Start organizing your first event and engage students.
                </p>

                <a href="{{ route('events.create') }}"
                   class="inline-block mt-8 bg-[#276152] text-white px-6 py-4 rounded-2xl hover:bg-[#0d3a35] transition">

                    Create First Event

                </a>

            </div>

        @endif

    </main>

</body>
</html>