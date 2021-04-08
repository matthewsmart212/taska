<x-app-layout>


    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">{{ $team->title }}</h1>
        <div>
            <a href="/teams/" class="py-2 px-4 bg-gray-300 text-white rounded-lg">Delete</a>
            <!-- TODO: sort out form for deleting a project -->
            <a href="/teams/" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Go Back</a>
            <a href="/teams/{{ $team->id }}/edit" class="py-2 px-4 bg-gray-500 text-white rounded-lg">Edit Team</a>
        </div>
    </div>


    <div class="w-full mb-6">
        <div class="bg-white rounded-lg p-4 shadow-sm">
            @if($users->count() > 0)
                <h1 class="text-lg">Add users to a team:</h1>

                <form method="POST" action="/teams/{{ $team->id }}/add-user-to-team">
                    @csrf
                    <select class="mt-4 rounded-lg border-gray-300" name="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button class="bg-gray-500 text-white p-2 ml-2 rounded-lg">Add user</button>
                </form>
            @else
                <h1>All users are in this team</h1>
            @endif

        </div>
    </div>



    <div class="grid grid-cols-4 gap-5">
        @forelse($team->users as $user)
            <div class="bg-white border-b border-gray-200 p-6 rounded-lg shadow-sm">
                <div class="flex justify-between">
                    <div>
                        <img src="/images/profile-pic.png" width="30" height="30" class="rounded-full inline-block mr-2">
                        <a class=" mt-2 inline-block font-bold mb-1"
                           href=""> {{ $user->name }} </a>
                    </div>
                    <div>
                        <form method="POST" action="/teams/{{ $team->id }}/remove-user-from-team">
                            @csrf
                            <input type="text" value="{{ $user->id }}" name="user_id" hidden/>
                            <button class="bg-gray-400 py-1 px-3 text-white rounded-lg inline-block mt-1">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <li>No users in team yet</li>
        @endforelse
    </div>

</x-app-layout>
