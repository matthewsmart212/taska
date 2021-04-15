<x-guest-layout>
        <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="central-login">
        <div class="relative w-auto my-6 mx-auto align-middle" style="width:600px;">
            <!--content-->
            <div
                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full outline-none focus:outline-none mt-32"
                style="background: rgb(91,33,182); background: linear-gradient(90deg, rgba(91,33,182,1) 0%, rgba(124,58,237,1) 15%, rgba(139,92,246,1) 40%);border-top-left-radius: 30px;"
            >
                <form method="POST" action="/login">
                    @csrf
                    <div>
                        <!--body-->
                        <div class="relative py-10 px-14 flex-auto bg-black rounded-tl-full">
                            <h2 class="text-white inline-block" style="font-size:32px;font-weight:800;">LOGIN</h2>
                            <div class="inline-block text-gray-200" type="button"  style="text-align: right; float: right; margin-top: -3px; font-size: 32px;}">
                                <img src="/images/taska-logo.png" width="100"/>
                            </div>

                            <div class="mt-6">
                                <input type="email" name="email" class="mt-2 block w-full text-black py-4 text-xl" placeholder="Your Email" required />
                            </div>
                            <div class="mt-6">
                                <input type="password" name="password" class="mt-2 block w-full text-black py-4 text-xl" placeholder="Your Password" required />
                            </div>
                            <div class="flex justify-between">
                                <div class="mt-6">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-white">Remember me</span>
                                    </label>
                                </div>
                                <div class="mt-5">
                                    <a class="underline text-sm text-white" href="/forgot-password">
                                        Forgot your password?
                                    </a>
                                </div>
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
    <div class="hidden opacity-50 fixed inset-0 z-40 bg-black" id="central-login-backdrop"></div>

</x-guest-layout>



