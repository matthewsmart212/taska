
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="invite-user-to-project">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-2xl font-semibold">
                    Invite member to project
                </h3>
            </div>

            <form method="POST" action="/add-user-to-project/{{ $project->id }}">
            @csrf
            <!--body-->
                <div class="relative p-6 flex-auto">
                    <div class="mb-3">
                        <label class="">Available Users:
                            <select class="w-full rounded-lg mt-2 border-gray-300" name="user_id">
                                @forelse($usersNotInProject as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option value="0">No more users</option>
                                @endforelse
                            </select>
                        </label>
                    </div>
                </div>

                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="cursor-pointer text-gray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('invite-user-to-project')">
                        Close
                    </div>
                    <button class="bg-purple-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        ADD USER
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="hidden opacity-50 fixed inset-0 z-40 bg-black" id="invite-user-to-project-backdrop"></div>

