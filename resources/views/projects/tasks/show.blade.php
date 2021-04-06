<x-app-layout>

    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <div>
            <a href="{{ $project->path() }}" class="text-md font-normal mt-1 inline-block text-gray-500">{{ $project->title }}</a>
            <span class="inline-block text-sm mr-1 ml-1 text-gray-500"> / </span>
            <h1 class="text-lg font-black mt-1 inline-block">{{ $task->title }}</h1>
        </div>
        <div>
            <a href="/projects/" class="py-2 px-4 bg-gray-300 text-white rounded-lg">Delete</a>
            <!-- TODO: sort out form for deleting a project -->
            <a href="{{ $project->path() }}" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Go Back</a>
        </div>
    </div>



    <div class="flex">
        <div class="w-3/5 pr-4">
                <div class="rounded-lg w-full bg-white px-8 py-6 mb-4 shadow-sm">
                    @include('components.write-comment')
                </div>
                <div class="rounded-lg bg-white shadow-sm">
                    @foreach($task->comments as $comment)
                            @include('components.comment')
                    @endforeach
                </div>
        </div>

        <div class="w-2/5">
            <div class="bg-white rounded-lg p-4 shadow-sm">
                <div class="flex justify-between mt-2">
                    <div>
                        <h1 class="text-lg">{{ $task->title }}</h1>
                    </div>
                    <div>
                        <a href="{{ $task->path() }}/edit" class="py-2 px-4 bg-gray-500 text-white rounded-lg">Edit Task</a>
                    </div>
                </div>

                <hr class="mt-5 mb-4"/>

                <h2 class="text-md">Description:</h2>
                <p class="mt-4">{{ $task->description }}</p>
            </div>
        </div>
    </div>

</x-app-layout>
