<x-app-layout>
    <form method="POST" action="/projects">
        @csrf
        <div class="flex justify-between mb-5 border-b border-gray-200 pb-6">
            <h1 class="text-lg font-black mt-1">{{ $user->name }}</h1>
            <div>
                <a href="/users/{{ $user->id }}/edit" class="py-2 px-4 bg-gray-400 text-white rounded-lg">Edit Profile</a>
            </div>
        </div>

        <div class="flex">
            <div class="w-2/5">
                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex justify-between mt-2">
                        <div>
                            <h1 class="text-lg">User Details</h1>
                        </div>
                    </div>

                    <hr class="mt-5 mb-4"/>

                    <div class="mb-3">
                        <h2 class="font-black">Name:</h2>
                        {{ $user->name }}
                    </div>
                    <div class="mb-3">
                        <h2 class="font-black">Email:</h2>
                        {{ $user->email }}
                    </div>
                    <div class="mb-3">
                        <h2 class="font-black">Role:</h2>
                        {{ $user->role->role }}

                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
