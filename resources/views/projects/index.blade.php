<x-app-layout>

<div class="w-full bg-gray-200 bg-opacity-25 px-7 fixed py-2" style="top:56px;">
    <div class="flex justify-between">
        <div>
            <h1 class="text-white">All Projects</h1>
        </div>
    </div>
</div>


<main class="bg-gray-100 pt-20 px-7" style="margin-top:56px;min-height: calc(100vh - 57px); background-image:url('/images/backgrounds/2.jpg');background-size:cover;" >
    @include('modals.create-project')
    <div class="grid grid-cols-7 gap-5">
            @foreach($projects as $project)
                <div
                    class="p-6 pl-0 pt-12 rounded-lg"
                     style="height:120px; background-image:url('{{ $project->background_image }}');background-size:cover;">

                    <a class="block mb-1 text-white pl-6 bg-gray-700 bg-opacity-75 rounded-tr-md rounded-br-md"
                        href="{{ $project->path() }}"> {{ $project->title }}
                    </a>

                </div>
            @endforeach
            <div class="bg-gray-200 bg-opacity-75 p-6 rounded-lg text-center cursor-pointer hover:bg-gray-700 hover:text-white" onclick="toggleModal('modal-id')">
                <p class="inline-block mt-6">Create new project</p>
            </div>
    </div>
</main>
</x-app-layout>
