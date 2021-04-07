<div class="w-full flex px-8 py-5 border-b border-gray-200">
    <div class="mr-4 flex-shrink-0">
        <a href="/">
            <img
                src="/images/profile-pic.png"
                alt=""
                class="rounded-full mr-2"
                width="40"
                height="40"
            />
        </a>
    </div>
    <div class="w-full">
        <h5 class="font-bold mb-2 inline-block">{{ $comment->user->name }}</h5>
        <span class="text-xs inline-block"> - {{ $comment->created_at->diffForHumans() }}</span>
        <p class="text-sm">
            {{ $comment->comment }}
        </p>
        <form class="mt-2 mb-4 hidden" method="POST" action="/tasks/{{ $task->id }}/comments/{{ $comment->id }}">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <textarea class="w-full rounded-lg border border-gray-200 text-sm" name="comment">{{ $comment->comment }}</textarea>
            <button class="text-xs bg-gray-500 p-2 block text-white rounded-lg">Update</button>
        </form>
        <div class="mt-2 text-sm">
            <i class="far fa-thumbs-up"></i><span class="ml-1">10</span>
            <i class="far fa-thumbs-down ml-2"></i><span class="ml-1">1</span>
            <i class="far fa-edit ml-2 update-comment"></i>
        </div>
    </div>
</div>
