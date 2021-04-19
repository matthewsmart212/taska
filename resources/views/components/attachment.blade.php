
    <div class="float-left">
        <a href="{{ $attachment->link }}" target="_blank">
            @switch($type)
                @case('image')
                <img src="{{ $attachment->link }}" style="width:77px; height:77px;" class="mb-3" />
                @break
                @case('pdf')
                <img src="/images/pdf.png" style="width:77px; height:77px;" class="mb-3" />
                @break
                @case('xls')
                <img src="/images/xls.png" style="width:77px; height:77px;" class="mb-3" />
                @break
                @case('xlsx')
                <img src="/images/xls.png" style="width:77px; height:77px;" class="mb-3" />
                @break
                @case('ppt')
                <img src="/images/ppt.png" style="width:77px; height:77px;" class="mb-3" />
                @break
                @case('pptx')
                <img src="/images/ppt.png" style="width:77px; height:77px;" class="mb-3" />
                @break
                @case('docx')
                <img src="/images/docx.png" style="width:77px; height:77px;" class="mb-3" />
                @break
            @endswitch
        </a>
    </div>
    <div class="float-left pl-3">
        <h3 class="text-xs font-bold">File Name:</h3>
        <p>{{ $attachment->name }}</p>
    </div>

