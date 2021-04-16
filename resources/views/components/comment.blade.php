<div class="comments">
    <div class="w-full flex px-6 pt-3">
        <div class="mr-2 flex-shrink-0">
            <a href="/">
                <img
                    src="{{ $user->avatar() }}"
                    alt=""
                    class="rounded-full mr-2 mt-1"
                    style="width:20px;height:20px;"
                />
            </a>
        </div>
        <form method="POST" action="/tasks/{{ $task->id }}/comments/{{ $comment->id }}" class="w-full">
            <div class="w-full">
                <h5 class="font-bold mb-2 inline-block text-xs">{{ $comment->user->name }}</h5>
                <span class="inline-block" style="font-size:10px;"> - {{ $comment->created_at->DiffForHumans() }}</span>
                <div class="flex">
                        <p class="text-xs bg-white rounded-md p-2 border border-gray-300 block">{{ $comment->comment }} </p>
                        <div class="hidden flex w-full">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <textarea class="w-full rounded-lg border border-gray-200 text-xs" name="comment">{{ $comment->comment }}</textarea>
                        </div>

                        <i class="fas fa-pen-square text-gray-400 hover:text-gray-600 ml-2 mt-2 cursor-pointer update-comment text-sm"></i>
                        <button class="fas fa-save text-gray-400 hover:text-gray-600 ml-2 mt-2 cursor-pointer hidden text-sm"></button>
                </div>
            </div>
        </form>
    </div>
</div>
