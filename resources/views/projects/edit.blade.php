<x-app-layout>
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
