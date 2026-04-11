<x-layout>

    <h1 class="text-4xl font-bold text-center mb-8">
        Personal Profile Generator
    </h1>

    <div class="bg-white text-black p-6 rounded-2xl shadow-xl mb-6">
        <form method="POST" action="{{ route('profiles.store') }}" class="space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Name"
                class="w-full p-3 border rounded-lg" required>

            <input type="number" name="age" placeholder="Age"
                class="w-full p-3 border rounded-lg" required>

            <input type="text" name="program" placeholder="Program"
                class="w-full p-3 border rounded-lg" required>

            <input type="email" name="email" placeholder="Email"
                class="w-full p-3 border rounded-lg" required>

            <select name="gender" class="w-full p-3 border rounded-lg" required>
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
            </select>

            <div>
                <p class="font-semibold mb-2">Hobbies (select at least 5):</p>
                <div class="grid grid-cols-2 gap-2">
                    @php
                        $hobbies = ['Reading','Gaming','Sports','Music','Travel','Cooking','Drawing','Coding'];
                    @endphp

                    @foreach($hobbies as $hobby)
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="hobbies[]" value="{{ $hobby }}">
                            {{ $hobby }}
                        </label>
                    @endforeach
                </div>
            </div>

            <textarea name="bio" placeholder="Short Bio"
                class="w-full p-3 border rounded-lg" required></textarea>

            <button class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">
                Add Profile
            </button>
        </form>
    </div>

    <form method="POST" action="{{ route('profiles.clear') }}" class="mb-6">
        @csrf
        <button class="w-full bg-red-500 p-3 rounded-lg hover:bg-red-600">
            Clear All Profiles
        </button>
    </form>

    <div class="grid md:grid-cols-2 gap-4">
        @foreach($profiles as $profile)
            <div class="bg-white text-black p-5 rounded-2xl shadow-lg hover:scale-105 transition">

                <h2 class="text-2xl font-bold mb-2">
                    {{ $profile['name'] }}
                </h2>

                <p><span class="font-semibold">Age:</span> {{ $profile['age'] }}</p>
                <p><span class="font-semibold">Program:</span> {{ $profile['program'] }}</p>
                <p><span class="font-semibold">Email:</span> {{ $profile['email'] }}</p>
                <p><span class="font-semibold">Gender:</span> {{ $profile['gender'] }}</p>

                <p class="mt-2">
                    <span class="font-semibold">Hobbies:</span>
                    {{ implode(', ', $profile['hobbies']) }}
                </p>

                <p class="mt-2 italic text-gray-700">
                    "{{ $profile['bio'] }}"
                </p>

            </div>
        @endforeach
    </div>

</x-layout>