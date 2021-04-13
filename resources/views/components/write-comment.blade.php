<form method="POST" action="/tasks/{{ $task->id }}/comments" class="hidden" id="write-message">
    @csrf
    <div id="write-comment" class="py-6 shadow-sm border-b border-gray-300">
        <div class="w-full flex px-6 ">
            <div class="mr-2 flex-shrink-0">
                <a href="/">
                    <img
                        src="/images/profile-pic.png"
                        alt=""
                        class="rounded-full mr-2"
                        width="33"
                        height="33"
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
