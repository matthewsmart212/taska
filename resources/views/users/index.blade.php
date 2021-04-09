<x-app-layout>

    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">All Users</h1>
        <a href="/users/create" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Create user</a>
    </div>


    <div class="w-full">
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Teams</th>
                    <th class="p-4">Joined</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="bg-white border-b border-gray-300 shadow-sm">
                        <td class="p-4 w-64">
                            <a href="">
                                <img src="/images/profile-pic.png" alt="profile pic" width="30" height="30" class="rounded-full inline-block mr-3" /> {{ $user->name }}
                            </a>
                        </td>
                        <td class="p-4">
                            @foreach($user->teams as $team)
                                <a href="{{ $team->path() }}">{{ $team->title }}</a> @if(!$loop->last) <span class="ml-1 mr-1">&</span> @endif
                            @endforeach
                        </td>
                        <td class="p-4">
                            {{ $user->created_at->diffForHumans() }}
                        </td>
                        <td class=" p-4">
                            <a href="/users/{{ $user->id }}" class="bg-gray-500 p-2 text-white rounded-lg">View</a>
                            <a href="/users/{{ $user->id }}/edit" class="bg-gray-500 p-2 text-white rounded-lg">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
