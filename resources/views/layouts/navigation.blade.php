<nav class="bg-white fixed top-0 w-full pr-11" style="z-index:500000000000000000000;height:56px;">
    <!-- Primary Navigation Menu -->
    <div class=" px-7">
        <div class="flex justify-between">
            <div>
                <ul class="mt-3">
                    <li class="inline-block mr-2">

                        <span class="border border-gray-200 p-2 py-1 rounded-md block hover:bg-gray-700 hover:text-white cursor-pointer">
                            Projects
                        </span>

                        <ul class="hidden">
                            <li>Project 1</li>
                            <li>Project 2</li>
                        </ul>
                    </li>
                    <li class="inline-block mr-2">
                        <form>
                            <div class="search-bar">
                                <i class="icon fa fa-search text-gray-700"></i>
                                <input class="input-text py-1" type="text" name="search" placeholder="What do you want?">
                            </div>
                        </form>
                    </li>
                    <li class="inline-block mr-2"></li>
                    <li class="inline-block mr-2"></li>
                </ul>
            </div>
            <div>
                <div x-data="{ dropdownOpen: false }" class="relative inline-block mt-1" >
                    <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none ">
                        <img src="/images/profile-pic.png" width="30" height="30" class="rounded-full inline-block mr-2"/>
                        <span class="inline-block">{{ auth()->user()->name }}</span>
                        <svg class="h-5 w-5 text-gray-800 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                    <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        <a href="/profile" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-purple-600 hover:text-white">
                            your profile
                        </a>
                        <form method="POST" action="/logout" class="w-full">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-purple-600 hover:text-white w-full text-left">
                                Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
