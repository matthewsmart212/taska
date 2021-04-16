<x-app-layout>

    @include('modals.invite-user-to-project')

    <div class="w-full bg-gray-200 bg-opacity-20 px-7 fixed py-2" style="top:56px;">
        <div class="flex justify-between">
            <div>
                <a href="/projects/" class="text-white text-xl inline-block"><i class="fas fa-caret-square-left"></i></a>
                <h1 class="text-white inline-block ml-2">{{ $project->title }}</h1>

                <span class="ml-4 mr-4 text-white">|</span>

                <div class="inline-block">
                    <i class="fas fa-users inline-block text-white mr-2"></i>
                    <h2 class="inline-block text-white mr-2">Members: </h2>
                    @foreach($project->users as $user)
                        <img src="{{ $user->avatar() }}" style="width:22px;height:22px;" class="rounded-full inline-block border border-gray-300" />
                    @endforeach
                    <button class="bg-gray-200 ml-3 text-xs py-1 px-3 rounded-sm text-gray-600 hover:bg-gray-600 hover:text-white" onclick="toggleModal('invite-user-to-project')">
                        + Invite user
                    </button>
                </div>
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


                    <form method="POST" action="{{ $project->path() }}/groups/{{ $group->id }}">
                        @csrf

                        <div class="flex justify-between">
                            <div>
                                <h2 class="text-xs font-bold ml-2 mt-1 mb-2 text-gray-700 inline-block">{{ $group->title }}</h2>
                                <input type="text"
                                       class="text-xs inline-block rounded-md border border-gray-300 mt-1 hidden p-1"
                                       placeholder="Write a comment ..."
                                       name="title"
                                       required
                                       style="height:inherit;padding-right:30px;"
                                       value="{{ $group->title }}"
                                />
                                <i class="fas fa-times-circle text-gray-400 hover:text-gray-600 text-sm ml-1 hidden cancel-group-title inline-block" style="margin-top:2px;"></i>
                            </div>
                            <div>
                                <i class="fas fa-pen-square text-gray-400 hover:text-gray-600 ml-1 text-sm cursor-pointer update-group-title"></i>
                                <button id="title-button" class="hidden fas fa-check-square text-gray-400 hover:text-gray-600 ml-3 cursor-pointer text-sm inline-block"></button>
                            </div>
                        </div>




                        <i class="fas fa-times-circle text-gray-400 hover:text-gray-600 text-sm ml-1 hidden cancel-title inline-block" style="margin-left:-25px;"></i>
                        <button id="title-button" class="hidden fas fa-check-square text-gray-400 hover:text-gray-600 ml-3 cursor-pointer text-sm inline-block mt-1"></button>
                    </form>

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

    <script type="text/javascript">
        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }

        $('.background-image').click(function(){
            $('.fa-check-circle').hide();
            $(this).prev().show();
            $('#background_image').val($(this).attr('data-bg-id'));
        });
    </script>
</x-app-layout>
