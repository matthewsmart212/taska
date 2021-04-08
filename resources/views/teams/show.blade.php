<x-app-layout>

    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">{{ $team->title }}</h1>
        <div>
            <a href="/teams/" class="py-2 px-4 bg-gray-300 text-white rounded-lg">Delete</a>
            <!-- TODO: sort out form for deleting a project -->
            <a href="/teams/" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Go Back</a>
            <a href="/teams/{{ $team->id }}/edit" class="py-2 px-4 bg-gray-500 text-white rounded-lg">Edit Team</a>
        </div>
    </div>


    <div class="w-full mb-6">
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <h1 class="text-lg">Team Information</h1>
            <p class="mt-4">...</p>
        </div>
    </div>




</x-app-layout>
