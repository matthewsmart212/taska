<x-app-layout>

    <div class="w-full bg-gray-200 bg-opacity-25 px-7 fixed py-2" style="top:56px;">
        <div class="flex justify-between">
            <div>
                <a href="/projects/" class="text-white text-xl inline-block"><i class="fas fa-caret-square-left"></i></a>
                <h1 class="text-white inline-block ml-2"> All Users</h1>
            </div>
            <div class="pr-12">
                <i class="fas fa-pen-square text-white text-xl ml-1 cursor-pointer" onclick="toggleModal('modal-id')"></i>
            </div>
        </div>
    </div>


    <main class="bg-gray-100 pt-20 px-7" style="margin-top:56px;min-height: calc(100vh - 57px); background-image:url('/images/backgrounds/2.jpg');background-size:cover;" >

        <div class="grid grid-cols-7 gap-5">
            @foreach($users as $user)
                <div
                    class="p-6 pl-0 pt-12 rounded-lg"
                    style="height:120px; background-image:url('');background-size:cover;">

                    <a class="block mb-1 text-white pl-6 bg-gray-700 bg-opacity-75 rounded-tr-md rounded-br-md"
                       href="{{ $user->path() }}"> {{ $user->name }}
                    </a>

                </div>
            @endforeach
            <div class="bg-gray-200 bg-opacity-75 p-6 rounded-lg text-center cursor-pointer hover:bg-gray-700 hover:text-white" onclick="toggleModal('modal-id')">
                <p class="inline-block mt-6">Create new project</p>
            </div>
        </div>
    </main>



    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">All Users</h1>
        <a href="/users/create" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Create user</a>
    </div>


    <div class="w-full">
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="p-4">Name</th>
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




