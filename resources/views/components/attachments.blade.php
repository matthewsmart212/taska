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
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="{{ $attachment->link }}" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('jpg')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="{{ $attachment->link }}" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('jpe')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="{{ $attachment->link }}" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('png')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="{{ $attachment->link }}" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('gif')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="{{ $attachment->link }}" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('pdf')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="/images/pdf.png" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('xls')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="/images/xls.png" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('xlsx')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="/images/xls.png" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('ppt')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="/images/ppt.png" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('pptx')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="/images/ppt.png" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @case('docx')
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="/images/docx.png" style="width:77px; height:77px;" class="mb-3" />
                    </a>
                    @break

                    @default
                    <a href="{{ $attachment->link }}" target="_blank">
                        <img src="/images/file.png" style="width:77px; height:77px;" class="mb-3" />
                    </a>

                @endswitch

            </div>
        @endforeach
    </div>
    <div class="w-full pl-14 pr-6">
        <form method="POST" action="/attachment/task/{{ $task->id }}" enctype="multipart/form-data" class="bg-gray-100 p-4 border border-gray-300">
            @csrf
            <input type="file" name="link" />
            <button class="float-right bg-gray-600 text-white px-2 py-1 inline-block rounded-md text-sm" type="submit">ADD FILE</button>
        </form>
    </div>
</div>
