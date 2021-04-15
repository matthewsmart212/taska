<x-guest-layout>
    <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="central-login">
        <div class="relative w-auto my-6 mx-auto align-middle" style="width:600px;">
            <!--content-->
            <div
                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full outline-none focus:outline-none mt-32"
                style="background: rgb(91,33,182); background: linear-gradient(90deg, rgba(91,33,182,1) 0%, rgba(124,58,237,1) 15%, rgba(139,92,246,1) 40%);border-top-left-radius: 30px;"
            >
                    @csrf
                    <div>
                        <!--body-->
                        <div class="relative py-10 px-14 flex-auto bg-black rounded-tl-full">
                            <h2 class="text-white inline-block" style="font-size:32px;font-weight:800;">
                                @if (Session::get('status'))
                                    NEARLY THERE!
                                @else
                                    VERIFY EMAIL
                                @endif

                            </h2>
                            <div class="inline-block text-gray-200" type="button"  style="text-align: right; float: right; margin-top: -3px; font-size: 32px;}">
                                <img src="/images/taska-logo.png" width="100"/>
                            </div>

                            @if (Session::get('status'))
                                <div class="mt-6">
                                    <p class="text-white font-semibold">Your verification Link has been sent!</p>
                                    <p class="text-white mt-4">If you did not receive this email you can request a new verification email by clicking the link below.</p>
                                </div>
                            @else
                                <div class="mt-6">
                                    <p class="text-white font-semibold">Thanks for signing up!</p>
                                    <p class="text-white mt-4">Were almost there, but before getting started, we need you to verify your email address by clicking on the link below. After clicking the link you will receive an email where you can verify your account.</p>
                                </div>
                            @endif


                            <div class="mt-6">

                                <form method="POST" action="/email/verification-notification" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-purple-600 text-white px-6 py-4" style="font-weight:800;">
                                        @if (Session::get('status'))
                                            Resend Verification Email
                                        @else
                                            Send Verification Email
                                        @endif
                                    </button>
                                </form>
                                <form method="POST" action="/logout" class="inline-block ml-2">
                                    @csrf
                                    <button type="submit" class="bg-purple-200 text-purple-600 px-6 py-4 " style="font-weight:800;">
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="grid grid-cols-4">
                            <div style="height:15px;" class="bg-purple-800"></div>
                            <div style="height:15px;" class="bg-purple-600"></div>
                            <div style="height:15px;" class="bg-purple-400"></div>
                            <div style="height:15px;" class="bg-purple-200 rounded-br-lg"></div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <div class="hidden opacity-50 fixed inset-0 z-40 bg-black" id="central-login-backdrop"></div>

</x-guest-layout>



