<x-app-layout>
    <form method="POST" action="/teams/{{ $team->id }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">

        <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
            <h1 class="text-lg font-black mt-1">Edit: {{ $team->title }}</h1>
            <div>
                <a href="/teams/{{ $team->id }}" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Cancel</a>
            </div>
        </div>

        <div class="flex">
            <div class="w-2/5">
                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex justify-between mt-2">
                        <div>
                            <h1 class="text-lg">Edit: {{ $team->title }}</h1>
                        </div>
                        <div>
                            <button class="py-2 px-4 bg-gray-500 text-white rounded-lg">Save</button>
                        </div>
                    </div>

                    <hr class="mt-5 mb-4"/>

                    <div class="mb-3">
                        <label class="">Title:
                            <input type="text" name="title" class="w-full rounded-lg mt-2 border-gray-300" value="{{ $team->title }}"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>





    </form>
</x-app-layout>
