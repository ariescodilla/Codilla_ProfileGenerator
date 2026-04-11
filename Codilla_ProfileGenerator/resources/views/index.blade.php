<!DOCTYPE html>
<html>
<head>
    <title>Profile Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-purple-500 to-indigo-600 min-h-screen p-6">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-2xl shadow-lg">

    <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">
        Personal Profile Generator
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/add-profile" class="space-y-4">
        @csrf

        <input type="text" name="name" placeholder="Name"
            class="w-full p-2 border rounded-lg">

        <input type="number" name="age" placeholder="Age"
            class="w-full p-2 border rounded-lg">

        <input type="text" name="program" placeholder="Program"
            class="w-full p-2 border rounded-lg">

        <input type="email" name="email" placeholder="Email"
            class="w-full p-2 border rounded-lg">

        <select name="gender" class="w-full p-2 border rounded-lg">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <div class="grid grid-cols-2 gap-2">
            <input type="text" name="hobbies[]" placeholder="Hobby 1" class="p-2 border rounded-lg">
            <input type="text" name="hobbies[]" placeholder="Hobby 2" class="p-2 border rounded-lg">
            <input type="text" name="hobbies[]" placeholder="Hobby 3" class="p-2 border rounded-lg">
            <input type="text" name="hobbies[]" placeholder="Hobby 4" class="p-2 border rounded-lg">
            <input type="text" name="hobbies[]" placeholder="Hobby 5" class="p-2 border rounded-lg">
        </div>

        <textarea name="bio" placeholder="Short Biography"
            class="w-full p-2 border rounded-lg"></textarea>

        <button type="submit"
            class="w-full bg-purple-600 text-white p-2 rounded-lg hover:bg-purple-700">
            Add Profile
        </button>
    </form>

    <form method="POST" action="/clear-profiles" class="mt-4">
        @csrf
        <button class="w-full bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">
            Clear All Profiles
        </button>
    </form>

</div>

<div class="max-w-4xl mx-auto mt-6 space-y-4">

    @if(count($profiles) > 0)
        @foreach($profiles as $profile)
            <div class="bg-white p-4 rounded-xl shadow-md">
                <h2 class="text-xl font-bold text-purple-700">
                    {{ $profile['name'] }}
                </h2>

                <p><strong>Age:</strong> {{ $profile['age'] }}</p>
                <p><strong>Program:</strong> {{ $profile['program'] }}</p>
                <p><strong>Email:</strong> {{ $profile['email'] }}</p>
                <p><strong>Gender:</strong> {{ $profile['gender'] }}</p>
                <p><strong>Hobbies:</strong> {{ implode(', ', $profile['hobbies']) }}</p>
                <p class="italic text-gray-600">{{ $profile['bio'] }}</p>
            </div>
        @endforeach
    @else
        <p class="text-white text-center">No profiles yet.</p>
    @endif

</div>

</body>
</html>
