@include('modals.central-register')
@include('modals.central-login')

<nav class="bg-white pb-3 border-b border-purple-100">
    <div class="container m-auto px-48">
        <div class="flex justify-between mt-3">
            <div>
                <span><img src="/images/taska-logo.png" width="99" height="40" class="rounded-tl-lg rounded-br-lg"></span>
            </div>
            <div>
                <ul class="text-lg font-semibold">
                    <li class="inline-block text-gray-600 mr-2">
                        <span onclick="toggleModal('central-login')" class="cursor-pointer hover:text-purple-600">Login</span>
                    </li>
                    <li class="inline-block">
                        <span
                            class="bg-purple-600 text-white py-2 px-4 block rounded-lg font-bold shadow-sm hover:bg-purple-800 hover:shadow-lg cursor-pointer"
                            onclick="toggleModal('modal-id')"
                        >Register for demo</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<section class="bg-gray-100 py-16">
    <div class="container m-auto px-48">
        <div class="flex">
            <div class="w-2/5 pr-2 pt-14">
                <h1 style="font-size:40px;font-weight:800;">WELCOME TO TASKA !</h1>
                <span class="text-sm text-gray-600">A portfolio project designed & built by <strong>Matthew Smart</strong> using <strong>Laravel 8</strong></span>
                <p class="text-lg text-gray-600 mt-3">Taska is a multi tenancy, project management application inspired by the amazing Trello.</p>
                <button class="bg-purple-600 border border-purple-600 py-3 px-7 text-lg text-white rounded-lg mt-5 inline-block font-bold shadow-sm hover:bg-purple-800 hover:shadow-lg">Give it a go!</button>
                <a href="/" class="bg-purple-100 border border-purple-200 py-3 px-7 text-lg text-purple-600 rounded-lg mt-5 inline-block ml-2 font-bold shadow-sm hover:bg-purple-200 hover:shadow-lg">View my CV</a>
            </div>
            <div class="w-3/5 pl-12">
                <img src="/images/taska-view-1.jpg" class="w-full rounded-lg border shadow-lg" />
            </div>
        </div>
    </div>
</section>


<section class="mt-12">
    <div class="container m-auto px-48">
        More Design to be done when app is complete
    </div>
</section>





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








