<x-app-layout>
    <div class="w-full bg-gray-200 bg-opacity-25 px-7 fixed py-2" style="top:56px;">
        <div class="flex justify-between">
            <div>
                <a href="/projects/" class="text-white text-xl inline-block"><i class="fas fa-caret-square-left"></i></a>
                <h1 class="text-white inline-block ml-2">{{ $project->title }}</h1>
            </div>
            <div class="pr-12">
                <i class="fas fa-pen-square text-white text-xl ml-1 cursor-pointer" onclick="toggleModal('modal-id')"></i>
            </div>
        </div>
    </div>

    <main class="bg-gray-100 pt-20 px-7" style="margin-top:56px;min-height: calc(100vh - 57px); background-image:url('{{ $project->background_image }}');background-size:cover;" >
        @include('modals.update-project')

        @if(isset($task))
            @include('modals.task')
        @endif

        <ul class="flex groups">
            @foreach($project->groups as $group)
                <li class="bg-gray-100 rounded-md p-2 mr-4 inline-block float-left" style="height:fit-content;width:250px;" data-group-id="{{ $group->id }}">
                    <h2 class="text-xs font-bold ml-2 mt-1 mb-2 text-gray-700">{{ $group->title }}</h2>

                    @forelse($group->tasks()->orderBy('order')->get() as $task)
                        @include('components.card')
                    @empty
                        <div class="column" style="min-height:50px;"></div>
                    @endforelse

                    <i class="fas fa-plus text-gray-500 text-xs inline-block ml-1"></i>
                    <p class="mt-2 text-gray-500 block text-xs create-new-task inline-block cursor-pointer">Create new task</p>

                    <form class="hidden" method="POST" action="{{ $project->path() }}/tasks">
                        @csrf
                        <input type="text" name="group_id" hidden value="{{ $group->id }}">
                        <input type="text" name="title" placeholder="Task name" class="w-3/4 rounded-lg mt-2 inline-block text-xs shadow-sm border-gray-200 border">
                        <button class="w-1/5 bg-gray-500 text-white rounded-lg inline-block p-2 float-right mt-2 text-xs">Add</button>
                    </form>
                </li>
            @endforeach

            @if($project->groups->count() < 5)
                <li class="bg-gray-300 rounded-lg p-4 mr-4 inline-block float-left w-1/6" style="height:fit-content;">
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
    </main>
</x-app-layout>
