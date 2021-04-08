<x-app-layout>

    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">All Projects</h1>
        @if(auth()->user()->isAdmin())
            <a href="/projects/create" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Create Project</a>
        @endif
    </div>


    <div class="grid grid-cols-4 gap-5">

            @forelse($projects as $project)
                <div class="bg-white border-b border-gray-200 p-6 rounded-lg shadow-sm">
                    <a class=" mt-2 block font-bold mb-1"
                        href="{{ $project->path() }}"> {{ $project->title }} </a>
                    <p>{{ $project->description }}</p>
                    <hr class="mt-2"/>
                    <div class="flex justify-between mt-4">
                        <div>
                            <span class="inline-block mr-2">Users: </span>
                            <img src="/images/profile-pic.png" width="30" height="30" class="rounded-full inline-block">
                            <img src="/images/profile-pic.png" width="30" height="30" class="rounded-full inline-block">
                        </div>
                        <div>
                            <a href="{{ $project->path() }}" class="bg-gray-400 py-1 px-3 text-white rounded-lg block">View</a>
                        </div>
                    </div>
                </div>
            @empty
                <li>No projects available</li>
            @endforelse

    </div>


</x-app-layout>
