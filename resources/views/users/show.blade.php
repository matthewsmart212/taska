<x-app-layout>

    <div class="w-full bg-gray-200 bg-opacity-25 px-7 fixed py-2" style="top:56px;">
        <div class="flex justify-between">
            <div>
                <h1 class="text-white inline-block">Your Profile</h1>
            </div>
        </div>
    </div>


    <main class="bg-gray-100 pt-20 px-7" style="margin-top:56px;min-height: calc(100vh - 57px); background-image:url('/images/backgrounds/2.jpg');background-size:cover;">

        <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" style="padding-top:180px;">
            <div class="relative w-auto my-6 mx-auto" style="max-width:500px;">
                <!--content-->
                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div class="py-5 px-10">
                        <img src="{{ $user->avatar() }}" class="rounded-full mx-auto border-4 border-white" style="margin-top:-95px;width:150px;height:150px;">
                        <div class="user-details">
                            <h1 class="text-center text-xl mt-4">{{ $user->name }}</h1>
                            <p class="text-center mt-4">{{ $user->email }}</p>
                            <p class="text-center mt-4">Role: {{ $user->role->role }}</p>
                        </div>
                    </div>

                    <div class="py-5 px-10 user-update-form hidden">
                        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="_method" value="PUT" hidden/>
                            <div class=" flex justify-between">
                                <label class="inline-block text-xl mt-3">Profile Picture</label>
                                <input type="file" name="avatar" class="mt-2 text-black text-xl inline-block" value="{{ $user->name }}" style="width:250px;" />
                            </div>
                            <div class="mt-6">
                                <input type="text" name="name" class="mt-2 block w-full text-black pl-5 py-4 text-xl" value="{{ $user->name }}" required />
                            </div>
                            <div class="mt-6">
                                <input type="email" name="email" class="mt-2 block w-full text-black  py-4 text-xl" value="{{ $user->email }}" required />
                            </div>
                            <div class="mt-6">
                                <select name="role_id" class="w-full text-black pl-5 py-4 text-xl">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if($role->id == $user->role->id) selected @endif>{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-6">
                                <button class="mx-auto bg-purple-400 text-white py-4 px-6 text-md font-bold hover:bg-purple-600 w-full" type="submit">
                                    Update Details
                                </button>
                            </div>
                        </form>
                    </div>

                    <!--footer-->
                    <div class="flex items-center p-6 border-t border-solid border-blueGray-200 rounded-b mt-6">
                        <button class="mx-auto bg-purple-400 text-white py-4 px-6 text-md font-bold hover:bg-purple-600" id="update-user">
                            Update Profile
                        </button>
                        <button class="hidden mx-auto bg-gray-400 text-white py-4 px-6 text-md font-bold hover:bg-gray-600" id="cancel-update-user">
                            Cancel
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="opacity-50 fixed inset-0 z-40 bg-black"></div>
    </main>

    <script>
        $('#update-user').click(function(){
            $(this).hide().next().show();
            $('.user-details').hide();
            $('.user-update-form').show();
        });
        $('#cancel-update-user').click(function(){
            $(this).hide().prev().show();
            $('.user-details').show();
            $('.user-update-form').hide();
        });
    </script>

</x-app-layout>




