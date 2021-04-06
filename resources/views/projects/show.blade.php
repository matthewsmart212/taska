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


    <div class="flex">
        <div class="w-1/5 pr-4">
            <div class="bg-gray-200 rounded-lg p-4">
                <h2>Todo:</h2>

                <a href="/projects/tasks/create" class="mt-3 block text-gray-500">Create new task</a>
            </div>
        </div>
        <div class="w-1/5 pr-4">
            <div class="bg-gray-200 rounded-lg p-4">
                <h2>Working On:</h2>

                @foreach($project->tasks as $task)
                    <a href="{{ $task->path() }}" class="block">
                        <div class="bg-white rounded-lg mt-4 p-4">
                            {{ $task->title }}
                        </div>
                    </a>
                @endforeach
                <a href="/projects/tasks/create" class="mt-3 block text-gray-500">Create new task</a>
            </div>
        </div>
        <div class="w-1/5 pr-4">
            <div class="bg-gray-200 rounded-lg p-4">
                <h2>Complete:</h2>

                <a href="/projects/tasks/create" class="mt-3 block text-gray-500">Create new task</a>
            </div>
        </div>
        <div class="w-2/5">
            <div class="bg-white rounded-lg p-4 shadow-sm">
                <h1 class="text-lg">Project Information</h1>
                <p class="mt-4">{{ $project->description }}</p>
            </div>
        </div>
    </div>

</x-app-layout>
