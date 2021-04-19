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

<form method="POST" action="/tasks/{{ $task->id }}/comments" class="hidden" id="write-message">
    @csrf
    <div id="write-comment" class="py-6 shadow-sm border-b border-gray-300">
        <div class="w-full flex px-6 ">
            <div class="mr-2 flex-shrink-0">
                <a href="/">
                    <img
                        src="{{ auth()->user()->avatar() }}"
                        alt=""
                        class="rounded-full mr-2"
                        style="width:30px;height:30px;"
                    />
                </a>
            </div>
            <div class="w-full flex justify-between">
                <textarea
                    class="w-full text-xs inline-block rounded-md border border-gray-300"
                    placeholder="Write a comment ..."
                    name="comment"
                    required
                    style="height:34px;width:92%;"
                ></textarea>
                <button class="bg-gray-700 text-white px-2 py-1 inline-block rounded-lg text-sm">Go</button>
            </div>
        </div>
    </div>
</form>
