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


    <div class="w-full mb-6">
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <h1 class="text-lg">Project Information</h1>
            <p class="mt-4">{{ $project->description }}</p>
        </div>
    </div>


    <ul class="flex groups">
        @foreach($project->groups as $group)
            <li class="bg-gray-200 rounded-lg p-4 mr-4 inline-block float-left w-1/5" style="height:fit-content;" data-group-id="{{ $group->id }}">
                <h2>{{ $group->title }}:</h2>
                @forelse($group->tasks()->orderBy('order')->get() as $task)
                    <div class="column" @if ($loop->first) style="min-height:50px;" @endif>
                        <div>
                            <a href="{{ $task->path() }}" class="portlet-header bg-white rounded-lg mt-4 p-4 block task" data-task-id="{{ $task->id }}">{{ $task->title }}</a>
                        </div>
                    </div>
                @empty
                    <div class="column" style="min-height:50px;"></div>
                @endforelse
            </li>
        @endforeach

        @if($project->groups->count() < 5)
            <li class="bg-gray-300 rounded-lg p-4 mr-4 inline-block float-left w-1/5" style="height:fit-content;">
                <p class="create-new-group">Create new group</p>
                <form class="hidden" method="POST" action="{{ $project->path() }}/groups">
                    @csrf
                    <input type="text" name="project_id" hidden value="{{ $project->id }}">
                    <input type="text" name="title" placeholder="Group name" class="w-3/4 rounded-lg mt-2 border-gray-400 inline-block">
                    <button class="w-1/5 bg-gray-500 text-white rounded-lg inline-block p-2 float-right mt-2">Go</button>
                </form>
            </li>
        @endif
    </ul>


</x-app-layout>
