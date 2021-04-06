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
    <div>
        <h5 class="font-bold mb-2 inline-block">{{ $comment->user->name }}</h5>
        <span class="text-xs inline-block"> - {{ $comment->created_at->diffForHumans() }}</span>
        <p class="text-sm">
            {{ $comment->comment }}
        </p>
        <div class="mt-2">
            <i class="far fa-thumbs-up"></i><span class="ml-1">10</span>
            <i class="far fa-thumbs-down ml-4"></i><span class="ml-1">1</span>
        </div>
    </div>
</div>
