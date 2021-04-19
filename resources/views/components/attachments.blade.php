<div class="border-b border-gray-300 pb-6 @if($task->attachments->count() < 1) hidden @endif" id="attachment-section">
    <div class="w-full flex p-6 pb-0 justify-between pb-3">
        <div>
            <div class="w-full inline-block">
                <i class="fas fa-paperclip"></i>
                <strong class="ml-3">Attachments</strong>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-3 pl-14 pr-6">
        @foreach($task->attachments as $attachment)
            <div>
                @switch($attachment->mime)
                    @case('jpeg')
                    @case('jpg')
                    @case('jpe')
                    @case('png')
                    @case('gif')
                        @include('components.attachment',['type'=>'image'])
                        @break
                    @case('pdf')
                        @include('components.attachment',['type'=>'pdf'])
                        @break
                    @case('xls')
                        @include('components.attachment',['type'=>'xls'])
                        @break
                    @case('xlsx')
                        @include('components.attachment',['type'=>'xlsx'])
                        @break
                    @case('ppt')
                        @include('components.attachment',['type'=>'ppt'])
                        @break
                    @case('pptx')
                        @include('components.attachment',['type'=>'pptx'])
                        @break
                    @case('docx')
                        @include('components.attachment',['type'=>'docx'])
                        @break
                    @default
                        @include('components.attachment',['type'=>'file'])
                @endswitch
            </div>
        @endforeach
            <form id="delete-attachment" method="POST">
                @csrf
                <input type="text" name="_method" value="DELETE" hidden />
            </form>
    </div>
    <div class="w-full pl-14 pr-6">
        <form method="POST" action="/attachment/task/{{ $task->id }}" enctype="multipart/form-data" class="bg-gray-100 p-4 border border-gray-300">
            @csrf
            <input type="file" name="link" />
            <button class="float-right bg-gray-600 text-white px-2 py-1 inline-block rounded-md text-sm" type="submit">ADD FILE</button>
        </form>
    </div>
</div>
