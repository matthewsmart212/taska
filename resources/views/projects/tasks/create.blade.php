<x-app-layout>

    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <div>
            <a href="{{ $project->path() }}" class="text-md font-normal mt-1 inline-block text-gray-500">{{ $project->title }}</a>
            <span class="inline-block text-sm mr-1 ml-1 text-gray-500"> / </span>
            <h1 class="text-lg font-black mt-1 inline-block">Create Task</h1>
        </div>
        <div>
            <a href="{{ $project->path() }}" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Go Back</a>
        </div>
    </div>


    <div class="flex">
        <div class="w-2/5">
            <form method="POST" action="{{ $project->path() }}/tasks">
                @csrf

                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex justify-between mt-2">
                        <div>
                            <h1 class="text-lg">Create Task</h1>
                        </div>
                        <div>
                            <button class="py-2 px-4 bg-gray-500 text-white rounded-lg">Save</button>
                        </div>
                    </div>

                    <hr class="mt-5 mb-4"/>

                    <div class="mb-3">
                        <label class="">Title:
                            <input type="text" name="title" class="w-full rounded-lg mt-2 border-gray-300" value=""/>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="">Description:
                            <textarea name="description" class="w-full rounded-lg mt-2 border-gray-300"></textarea>
                        </label>
                    </div>



                </div>
            </form>
        </div>
    </div>

</x-app-layout>