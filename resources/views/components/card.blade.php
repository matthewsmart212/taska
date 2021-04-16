<div class="column" @if ($loop->first) style="min-height:30px;" @endif>
    <div>
        <a href="{{ $task->path() }}"
           class="shadow-sm border-gray-200 border task portlet-header bg-white rounded-lg mt-1 px-2 py-2 block task text-xs hover:bg-gray-200 hover:border-gray-300"
           data-task-id="{{ $task->id }}"
        >
            <div class="flex justify-between">
                <span class="inline-block">{{ $task->title }}</span>
                </i>
            </div>
            <hr style="height:5px;border:0;"/>

            @if($task->comments->count() > 0)

                <i class="far fa-comment text-gray-500 mr-2"><span class="font-semibold" style='margin-left:2px; font-family:Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";'>{{ $task->comments->count() }}</span></i>
            @endif

            @if(isset($task->description))
                <i class="fas fa-align-left text-gray-500 mr-2"></i>
            @endif

            @if($task->attachments->count() > 0)
                <i class="fas fa-paperclip text-gray-500 mr-2"></i>
            @endif
        </a>
    </div>
</div>
