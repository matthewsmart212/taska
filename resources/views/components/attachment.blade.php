
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
        <a href="{{ $attachment->link }}" class="far fa-eye text-purple-300 hover:text-purple-600 p-2 pl-0 cursor-pointer"></a>
        <i class="fas fa-trash-alt text-red-300 hover:text-red-600 p-2 pl-0 cursor-pointer" onclick="toggleModal('delete-attachment')" data-attachment-id="{{ $attachment->id }}"></i>
        @include('modals.confirm-attachment-delete')
    </div>


    <script type="text/javascript">

        $('.fa-trash-alt').click(function(){
            $('form#delete-attachment').attr('action', '/attachment/'+ $(this).attr('data-attachment-id') +'/tasks/{{ $task->id }}');
        });

        function deleteAttachment()
        {
            $('form#delete-attachment').submit();
        }

        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }

        $('.background-image').click(function(){
            $('.fa-check-circle').hide();
            $(this).prev().show();
            $('#background_image').val($(this).attr('data-bg-id'));
        });
    </script>
