<x-app-layout>
    <form method="POST" action="/projects">
        @csrf
        <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
            <h1 class="text-lg font-black mt-1">Create Project</h1>
            <div>
                <a href="/projects/" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Go Back</a>
                <button class="py-2 px-4 bg-gray-500 text-white rounded-lg">Save Project</button>
            </div>
        </div>

        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1>Create a project</h1>
                    <label>Name:</label>
                    <input type="text" name="title"/>

                    <label>Description:</label>
                    <textarea name="description"></textarea>
            </div>
        </div>
    </form>
</x-app-layout>
