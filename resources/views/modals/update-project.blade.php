<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-2xl font-semibold">
                    Update Project
                </h3>
            </div>

            <form method="POST" action="/projects/{{ $project->id }}">
                @csrf
                    <input type="text" name="_method" value="PUT" hidden/>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <div class="mb-3">
                        <label class="">Title:
                            <input type="text" name="title" class="w-full rounded-lg mt-2 border-gray-300" value="{{ $project->title }}" required/>
                        </label>
                    </div>
                    <p>Choose Background:</p>
                    <div class="mt-3 grid grid-cols-3 gap-5">
                        <?php $currentBackground = ''; ?>
                        @for($i=1;$i<10;$i++)
                            <?php
                                $background = "/images/backgrounds/".$i.".jpg";
                                if($background == $project->background_image){ $currentBackground = $i;}
                            ?>
                            <div class="relative">
                                <i class="far fa-check-circle absolute bottom-2 right-2 text-green-400 @if($background !== $project->background_image) hidden @endif" ></i>
                                <img src="/images/backgrounds/{{ $i }}.jpg" class="background-image" width="100" height="56" data-bg-id="{{ $i }}" />
                            </div>
                        @endfor
                        <input type="text" name="background_image" id="background_image" hidden value="{{ $currentBackground }}"/>
                    </div>
                </div>

                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="cursor-pointer text-gray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Close
                    </div>
                    <button class="bg-green-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Save Changes
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="hidden opacity-50 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<script type="text/javascript">
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
