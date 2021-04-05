<x-app-layout>

    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">{{ $project->title }}</h1>
        <div>
            <a href="/projects/" class="py-2 px-4 bg-gray-300 text-white rounded-lg">Delete</a>
            <!-- TODO: sort out form for deleting a project -->
            <a href="/projects/" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Go Back</a>
            <a href="/projects/{{ $project->id }}/edit" class="py-2 px-4 bg-gray-500 text-white rounded-lg">Edit Project</a>
        </div>
    </div>


    <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1>{{ $project->title }}</h1>
        </div>
    </div>
</x-app-layout>
