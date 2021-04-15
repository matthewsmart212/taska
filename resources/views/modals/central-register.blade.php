
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
    <div class="relative w-auto my-6 mx-auto" style="width:600px;">
        <!--content-->
        <div
            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full outline-none focus:outline-none"
            style="background: rgb(91,33,182); background: linear-gradient(90deg, rgba(91,33,182,1) 0%, rgba(124,58,237,1) 15%, rgba(139,92,246,1) 40%);border-top-left-radius: 30px;"
        >
            <form method="POST" action="/register-company">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div>


                    <!--body-->
                    <div class="relative py-10 px-14 flex-auto bg-black rounded-tl-full">

                        <h2 class="text-white inline-block" style="font-size:32px;font-weight:800;">CREATE YOUR ACCOUNT</h2>

                        <div class="cursor-pointer inline-block text-gray-200" type="button" onclick="toggleModal('modal-id')" style="text-align: right; float: right; margin-top: -3px; font-size: 32px; padding: 0 10px; }">
                            x
                        </div>

                        <div class="mt-6">
                            <input type="text" name="company_name" class="mt-2 block w-full text-black pl-5 py-4 text-xl" placeholder="Company Name" required />
                        </div>
                        <div class="mt-6">
                            <input type="text" name="name" class="mt-2 block w-full text-black  py-4 text-xl" placeholder="Your Name" required />
                        </div>
                        <div class="mt-6">
                            <input type="email" name="email" class="mt-2 block w-full text-black py-4 text-xl" placeholder="Your Email" required />
                        </div>
                        <div class="mt-6">
                            <input type="password" name="password" class="mt-2 block w-full text-black py-4 text-xl" placeholder="Your Password" required />
                        </div>
                        <div class="mt-6">
                            <input type="password" name="password_confirmation" class="mt-2 block w-full text-black py-4 text-xl" placeholder="Confirm Password" required />
                        </div>
                        <div class="mt-6">
                            <button class="bg-purple-600 text-white py-4 w-full" style="font-weight:800;">LETS GO!</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-4">
                        <div style="height:15px;" class="bg-purple-800"></div>
                        <div style="height:15px;" class="bg-purple-600"></div>
                        <div style="height:15px;" class="bg-purple-400"></div>
                        <div style="height:15px;" class="bg-purple-200 rounded-br-lg"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="hidden opacity-50 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

