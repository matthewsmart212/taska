<x-app-layout>

    <div class="w-full bg-gray-200 bg-opacity-25 px-7 fixed py-2" style="top:56px;">
        <div class="flex justify-between">
            <div>
                <h1 class="text-white inline-block"> All Users</h1>
            </div>
        </div>
    </div>


    <main class="bg-gray-100 pt-20 px-7" style="margin-top:56px;min-height: calc(100vh - 57px); background-image:url('/images/backgrounds/2.jpg');background-size:cover;" >

        <div class="w-full">
            <table class="w-1/2">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-600 border-b border-gray-200 ">
                        <th class="p-4">USER</th>
                        <th class="p-4">ROLE</th>
                        <th class="p-4">CREATED AT</th>
                        <th class=" p-4" width="140">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="bg-white border-b border-gray-200">
                            <td class="p-4">
                                <img src="{{ $user->avatar() }}" style="width:30px; height:30px;" class="rounded-full inline-block"/>
                                <h2 class="inline-block ml-2 font-semibold">{{ $user->name }}</h2>
                            </td>
                            <td class="p-4">
                                Admin
                            </td>
                            <td class="p-4">
                                Jan 21 2020
                            </td>
                            <td class="p-4">
                                <i class="far fa-eye text-purple-300 hover:text-purple-600 p-2 pl-0 cursor-pointer"></i>
                                <i class="far fa-edit text-purple-300 hover:text-purple-600 p-2 cursor-pointer"></i>
                                <i class="fas fa-trash-alt text-red-300 hover:text-red-600 p-2 cursor-pointer"></i>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>

</x-app-layout>




