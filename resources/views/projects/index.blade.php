<x-app-layout>
    <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1>Projects</h1>
            <ul>
                @forelse($projects as $project)
                    <li><a href="{{ $project->path() }}"> {{ $project->title }} </a></li>
                @empty
                    <li>No projects available</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
