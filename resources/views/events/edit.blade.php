<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event | EMS</title>

    @vite(['resources/css/app.css'])

    <style>
        .luxury-shadow {
            box-shadow: 0 20px 60px rgba(13, 58, 53, 0.12);
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255,255,255,.65);
        }
    </style>
</head>
<body class="bg-[#fbf6f0]">

    <x-sidebar />

    <main class="ml-72 min-h-screen p-8">

        <!-- Page Header -->
        <div class="mb-8">

            <h1 class="text-4xl font-bold text-[#0d3a35]">
                Create Event
            </h1>

            <p class="text-gray-500 mt-2">
                Organize and schedule a new event for students.
            </p>

        </div>

        <!-- Hero Banner -->
        <div
            class="bg-gradient-to-r from-[#0d3a35] to-[#276152]
                   rounded-[32px]
                   p-8
                   text-white
                   luxury-shadow
                   mb-8">

            <h2 class="text-3xl font-bold mb-2">
                New Event Registration
            </h2>

            <p class="text-[#b1b7ab]">
                Fill out the event details below to create and publish a new event.
            </p>

        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-[32px] luxury-shadow p-8">

            <form action="{{ route('events.update',$event->id) }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <!-- Event Name -->
                    <div class="lg:col-span-2">
                        <label class="block mb-2 font-semibold text-[#0d3a35]">
                            Event Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            autocomplete="off"
                            value="{{old('name',$event->name)}}"
                            placeholder="Enter event name"
                            class="w-full border border-[#b1b7ab] rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                    <!-- Event Type -->
                    <div>
                        <label class="block mb-2 font-semibold text-[#0d3a35]">
                            Event Type
                        </label>

                        <select
                            name="type"
                            class="w-full border border-[#b1b7ab] rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#276152]">

                            <option value="" >Select Type</option>
                            <option value="seminar" {{$event->type == 'seminar'? 'selected' : ''}} >Seminar</option>
                            <option value="workshop" {{$event->type == 'workshop'? 'selected' : ''}}>Workshop</option>
                            <option value="conference" {{$event->type == 'conference'? 'selected' : ''}}>Conference</option>
                            <option value="competition" {{$event->type == 'competition'? 'selected' : ''}}>Competition</option>
                            <option value="cultural" {{$event->type == 'cultural'? 'selected' : ''}}>Cultural</option>
                            <option value="sports" {{$event->type == 'sports'? 'selected' : ''}}>Sports</option>

                        </select>
                    </div>

                    <!-- Organised By -->
                    <div>
                        <label class="block mb-2 font-semibold text-[#0d3a35]">
                            Organised By
                        </label>

                        <input
                            type="text"
                            name="organised_by"
                            autocomplete="off"
                            value="{{old('organised_by',$event->organised_by)}}"
                            placeholder="Department / Club"
                            class="w-full border border-[#b1b7ab] rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                    <!-- Date -->
                    <div>
                        <label class="block mb-2 font-semibold text-[#0d3a35]">
                            Event Date
                        </label>

                        <input
                            type="date"
                            name="date"
                            value="{{old('date',$event->date)}}"
                            class="w-full border border-[#b1b7ab] rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                    <!-- Time -->
                    <div>
                        <label class="block mb-2 font-semibold text-[#0d3a35]">
                            Event Time
                        </label>

                        <input
                            type="time"
                            name="time"
                            value="{{old('time',$event->time)}}"
                            class="w-full border border-[#b1b7ab] rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                    <div>
                        <label class="block mb-2 font-semibold text-[#0d3a35]">
                            Event Venue
                        </label>

                        <input
                            type="text"
                            name="venue"
                            value="{{old('venue',$event->venue)}}"
                            class="w-full border border-[#b1b7ab] rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                    <!-- Description -->
                    <div class="lg:col-span-2">
                        <label class="block mb-2 font-semibold text-[#0d3a35]">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            placeholder="Describe the event..."
                            class="w-full border border-[#b1b7ab] rounded-2xl px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-[#276152]"
                            >{{old('description',$event->description)}}</textarea>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 mt-8">

                    <a href="{{ route('events.index') }}"
                       class="px-6 py-3 rounded-2xl border border-[#b1b7ab] text-[#0d3a35] hover:bg-[#fbf6f0] transition">
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-2xl bg-[#276152] text-white font-semibold hover:bg-[#0d3a35] transition">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>