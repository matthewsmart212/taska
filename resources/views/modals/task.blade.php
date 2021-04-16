
<div class="flex overflow-x-hidden overflow-y-auto fixed top-0 inset-x-0 z-50 outline-none focus:outline-none justify-center items-center" id="task" style="top:77px;">
    <div class="relative my-6" style="min-width:800px;max-width:800px;">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-gray-200 outline-none focus:outline-none pb-6">

            <!--header-->
            <form method="POST" action="{{ $task->path() }}/title">
                @csrf
                <input type="text" name="_method" value="PUT" hidden />
                <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t bg-white">
                    <div>
                        <h3 class="text-lg font-semibold inline-block" id="title">{{ $task->title }}</h3>
                        <input type="text"
                            class="text-md inline-block rounded-md border border-gray-300 mt-1 hidden"
                            placeholder="Write a comment ..."
                            name="title"
                            required
                            style="height:inherit;padding-right:30px;"
                            value="{{ $task->title }}"
                        />
                        <i class="fas fa-pen-square text-gray-400 hover:text-gray-600 ml-1 text-sm cursor-pointer update-title"></i>
                        <i class="fas fa-times-circle text-gray-400 hover:text-gray-600 text-sm ml-1 hidden cancel-title inline-block" style="margin-left:-25px;"></i>
                        <button id="title-button" class="hidden fas fa-check-square text-gray-400 hover:text-gray-600 ml-3 cursor-pointer text-sm inline-block mt-1"></button>
                    </div>
                    <div>
                        <a href="{{ $project->path() }}" class="cursor-pointer text-gray-500 background-transparent font-bold uppercase text-sm outline-none focus:outline-none mt-1 ease-linear transition-all duration-150">Close</a>
                    </div>
                </div>
            </form>

            <div class="justify-between flex">
                <div>
                    <!--body-->
                    <div class="relative flex-auto">
                        <form method="POST" action="{{ $task->path() }}/description">
                            @csrf
                            <input type="text" name="_method" value="PUT" hidden />
                            <!-- Description -->
                            <div class="w-full flex p-6 border-b border-gray-300" style="min-width:600px;">
                                <div class="mr-5 flex-shrink-0">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                <div class="w-full">
                                    <strong>Description </strong>

                                    <i class="fas fa-pen-square text-gray-400 hover:text-gray-600 ml-1 text-sm cursor-pointer update-description"></i>
                                    <i class="fas fa-times-circle text-gray-400 hover:text-gray-600 text-sm ml-1 hidden cancel-description"></i>

                                    <p id="description" class="text-sm">
                                        @if($task->description)
                                            {{ $task->description }}
                                        @else
                                            No description
                                        @endif
                                    </p>

                                    <div class="w-full flex justify-between">
                                            <textarea
                                                class="w-full text-xs inline-block rounded-md border border-gray-300 mt-1 hidden"
                                                placeholder="Write a comment ..."
                                                name="description"
                                                required
                                                style="height:inherit;"
                                            >{{ $task->description }}</textarea>
                                        <div class="hidden">
                                            <button class="fas fa-check-square text-gray-400 hover:text-gray-600 ml-2 cursor-pointer text-sm inline-block mt-1"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>




                        <!-- Attachment section -->
                        <div class="border-b border-gray-300 pb-6">
                            <div class="w-full flex p-6 pb-0 justify-between pb-3">
                                <div>
                                    <div class="w-full inline-block">
                                        <i class="fas fa-paperclip"></i>
                                        <strong class="ml-3">Attachments</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full pl-14 pr-6">
                                <form method="POST" action="/attachment/task/{{ $task->id }}" enctype="multipart/form-data" class="bg-gray-100 p-4 border border-gray-300">
                                    @csrf
                                    <input type="file" name="link" />
                                    <button class="float-right bg-gray-600 text-white px-2 py-1 inline-block rounded-md text-sm" type="submit">ADD FILE</button>
                                </form>
                            </div>
                        </div>




                        <!-- Activity section -->
                        <div class="w-full flex p-6 pb-0 justify-between border-b border-gray-300 pb-3">
                            <div>
                                <div class="w-full inline-block">
                                    <i class="far fa-comments"></i>
                                    <strong class="ml-3">Comments</strong>
                                </div>
                            </div>
                            <div>
                                <span class="text-sm rounded-md cursor-pointer cancel-message font-semibold hidden">Cancel comment</span>
                                <span class="text-sm rounded-md cursor-pointer write-message font-semibold">Write comment</span>
                            </div>
                        </div>

                        <!-- Write a message -->
                        @include('components.write-comment')

                        <!-- Comments -->
                        @forelse($task->comments as $comment)
                            @include('components.comment')
                        @empty
                            <p class="px-6 pt-6">No messages</p>
                        @endforelse
                    </div>

                </div>
                <div style="width:500px;" class="border-l border-gray-300 px-4 py-6">
                    <ul>
                        <li class="bg-gray-100 px-2 py-1 border border-gray-300 hover:bg-purple-100 cursor-pointer">
                            <i class="fas fa-paperclip text-gray-600 mr-1"></i> Attachment
                        </li>
                        <li class="bg-gray-100 px-2 py-1 border border-gray-300 hover:bg-purple-100 cursor-pointer mt-2">
                            <i class="fas fa-list-ol text-gray-600 mr-1"></i> Activity
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=" opacity-50 fixed inset-0 z-40 bg-black" id="task-backdrop"></div>

