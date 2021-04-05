<x-app-layout>
    <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1>Create a project</h1>

            <form method="POST" action="/projects">
                @csrf

                <label>Name:</label>
                <input type="text" name="title"/>

                <label>Description:</label>
                <textarea name="description"></textarea>

                <button>Create Project</button>
            </form>
        </div>
    </div>
</x-app-layout>
