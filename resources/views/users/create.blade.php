<x-app-layout>

    <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
        <h1 class="text-lg font-black mt-1">Create User</h1>
        <div>
            <a href="/users/" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Go Back</a>
        </div>
    </div>

    <div class="flex">
        <div class="w-2/5">
            <div class="bg-white rounded-lg p-4 shadow-sm">
                <form method="POST" action="/users">
                    @csrf
                    <div class="flex justify-between mt-2">
                        <div>
                            <h1 class="text-lg">User Details</h1>
                        </div>
                        <div>
                            <button class="bg-gray-500 py-2 px-4 text-white rounded-lg">Save Details</button>
                        </div>
                    </div>
                    <hr class="mt-5 mb-4"/>

                    <div class="mb-3">
                        <label class="">Name:
                            <input type="text" name="name" class="w-full rounded-lg mt-2 border-gray-300" value=""/>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="">Email:
                            <input type="email" name="email" class="w-full rounded-lg mt-2 border-gray-300" value=""/>
                        </label>
                    </div>
                    @if(auth()->user()->isAdmin())
                        <div class="mb-3">
                            Role:
                            <select class="w-full rounded-lg mt-2 border-gray-300" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="">Password:
                            <input type="password" name="password" class="w-full rounded-lg mt-2 border-gray-300" value=""/>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="">Confirm Password:
                            <input type="password" name="password_confirmation" class="w-full rounded-lg mt-2 border-gray-300" value=""/>
                        </label>
                    </div>


                </form>
            </div>
        </div>
    </div>
</x-app-layout>
