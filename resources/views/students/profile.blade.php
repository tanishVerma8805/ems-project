<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile | EMS</title>

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

<div class="flex min-h-screen">

    <x-sidebar />

    <main class="ml-72 min-h-screen w-[calc(100vw-18rem)] p-8">

        <!-- Header -->
        <div class="mb-8">

            <h1 class="text-4xl font-bold text-[#0d3a35]">
                My Profile
            </h1>

            <p class="text-gray-500 mt-2">
                Complete your student information for event registrations.
            </p>

        </div>

        <!-- Hero Card -->
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

                    <h2 class="text-3xl font-bold">
                        {{ $user->name }}
                    </h2>

                    <p class="text-[#cfd7d0] mt-2">
                        {{ $user->email }}
                    </p>

                </div>

                <div class="glass rounded-3xl p-6 text-[#0d3a35]">

                    <h3 class="font-bold">
                        Profile Status
                    </h3>

                    <p class="mt-2">
                        Complete your academic details
                    </p>

                </div>

            </div>

        </section>

        <!-- Profile Form -->
        <section
            class="bg-white
                   rounded-[32px]
                   p-8
                   luxury-shadow">

            <form
                action="{{ route('students.save') }}"
                method="POST">

                @csrf
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Name -->
                    <div>
                        <label class="block mb-2 font-medium">
                            Full Name
                        </label>

                        <input
                            type="text"
                            value="{{$user->name }}"
                            disabled
                            class="w-full px-4 py-4 rounded-2xl bg-gray-100 border border-gray-200">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block mb-2 font-medium">
                            Email Address
                        </label>

                        <input
                            type="email"
                            value="{{ $user->email }}"
                            disabled
                            class="w-full px-4 py-4 rounded-2xl bg-gray-100 border border-gray-200">
                    </div>

                    <!-- Roll Number -->
                    <div>
                        <label class="block mb-2 font-medium">
                            Roll Number
                        </label>

                        <input
                            type="text"
                            name="roll_no"
                            value="{{ old('roll_no', $student->roll_no ?? '') }}"
                            autocomplete="off"
                            required
                            class="w-full px-4 py-4 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                    <!-- Course -->
                    <div>
                        <label class="block mb-2 font-medium">
                            Course
                        </label>

                        <input
                            type="text"
                            name="course"
                            autocomplete="off"
                            value="{{ old('course', $student->course ?? '') }}"
                            required
                            placeholder="B.Tech CSE"
                            class="w-full px-4 py-4 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                    <!-- Department -->
                    <div>
                        <label class="block mb-2 font-medium">
                            Department
                        </label>

                        <input
                            type="text"
                            name="department"
                            value="{{ old('department', $student->department ?? '') }}"
                            autocomplete="off"
                            required
                            placeholder="Computer Science"
                            class="w-full px-4 py-4 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#276152]">
                    </div>

                </div>

                <div class="mt-8">

                    <button
                        type="submit"
                        class="bg-[#276152]
                               hover:bg-[#1f5144]
                               text-white
                               px-6
                               py-4
                               rounded-2xl
                               font-semibold
                               transition">

                        Save Profile

                    </button>

                </div>

            </form>

        </section>

    </main>

</div>

</body>
</html>

