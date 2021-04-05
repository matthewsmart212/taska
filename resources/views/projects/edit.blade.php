<x-app-layout>
    <form method="POST" action="/projects/{{ $project->id }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">

        <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
            <h1 class="text-lg font-black mt-1">Edit: {{ $project->title }}</h1>
            <div>
                <a href="/projects/{{ $project->id }}" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Cancel</a>
                <button class="py-2 px-4 bg-gray-500 text-white rounded-lg">Save Changes</button>
            </div>
        </div>

        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1>Edit: {{ $project->title }}</h1>
                    <label>Name:</label>
                    <input type="text" name="title" value="{{ $project->title }}"/>

                    <label>Description:</label>
                    <textarea name="description">{{ $project->description }}</textarea>
            </div>
        </div>
    </form>
</x-app-layout>
