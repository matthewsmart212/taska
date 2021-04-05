<x-app-layout>
    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">Edit: {{ $project->title }}</h1>
        <div>
            <a href="/projects/{{ $project->id }}" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Cancel</a>
            <a href="/projects/create" class="py-2 px-4 bg-gray-500 text-white rounded-lg">Save Changes</a>
        </div>
    </div>

    <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1>Edit: {{ $project->title }}</h1>

            <form method="POST" action="/projects">
                @csrf

                <label>Name:</label>
                <input type="text" name="title" value="{{ $project->title }}"/>

                <label>Description:</label>
                <textarea name="description">{{ $project->description }}</textarea>

                <button>Update Project</button>
            </form>
        </div>
    </div>
</x-app-layout>
