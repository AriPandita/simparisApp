<div> 
    <nav id="nav-container"
        class="fixed top-0 left-0 z-50 w-full bg-white border-b border-gray-200 select-none dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between w-full max-w-screen-xl p-4 mx-auto">
            <a href="/" wire:navigate class="flex items-center">
                <div class="flex items-center justify-center">
                    <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" width="47" height="67"
                        viewBox="0 0 47 67" fill="none">
                        <path
                            d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z"
                            fill="currentColor" />
                        <path
                            d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z"
                            fill="currentColor" />
                        <path
                            d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z"
                            fill="currentColor" />
                        <path
                            d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z"
                            fill="currentColor" />
                        <path
                            d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z"
                            fill="currentColor" />
                    </svg>
                    <span id="logo"
                        class="hidden min-[360px]:block font-serif text-xl text-gray-700 md:text-gray-800">The Cajuput
                        Spa</span>
                </div>
            </a>
            <div class="flex gap-3 md:order-2">
                @auth
                <div class="relative" x-data="{dropdown: false}">
                    <div class="hover:cursor-pointer">
                        <div class="text-green-600 bg-green-200 border border-green-600 rounded-full size-12"
                            x-on:click="dropdown = !dropdown" class="w-10 h-10 rounded-full cursor-pointer">
                            <svg class="mx-auto text-green-600 size-10" xmlns="http://www.w3.org/2000/svg" width="47"
                                height="67" viewBox="0 0 47 67" fill="none">
                                <path
                                    d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z"
                                    fill="currentColor" />
                                <path
                                    d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z"
                                    fill="currentColor" />
                                <path
                                    d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z"
                                    fill="currentColor" />
                                <path
                                    d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z"
                                    fill="currentColor" />
                                <path
                                    d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        @empty(auth()->user()->email_verified_at || session('message'))
                        <div
                            class="absolute inline-flex items-center justify-center w-5 h-5 text-xs text-gray-800 bg-red-500 border-2 border-white rounded-full -top-1 -end-1 dark:border-gray-900">
                            1
                        </div>
                        @endempty
                    </div>
                    <!-- Dropdown menu -->
                    <div x-show="dropdown"
                        class="absolute right-0 z-10 translate-x-8 translate-y-10 bg-white divide-y divide-gray-100 rounded-lg shadow top-5 w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-gray-900 dark:text-gray-800">
                            <div>Hello! {{auth()->user()->name}}</div>
                            <div class="text-xs text-gray-500 truncate">{{auth()->user()->email}}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="{{Auth::user()->level == 'customer' ? '/transaction' : '/dashboard'}}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-800">My
                                    Transaction</a>
                            </li>
                            @empty(auth()->user()->email_verified_at || session('message'))
                            <li>
                                <form action="/email/verification-notification" method="POST" class="">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center justify-between w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-800">
                                        Verify Your Email
                                        <span class="w-3 h-3 bg-red-500 rounded-full dark:border-gray-900"></span>
                                    </button>
                                </form>
                            </li>
                            @endempty
                        </ul>
                        <div class="py-1">
                            <a href="logout"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-gray-800">Sign
                                out</a>
                        </div>
                    </div>
                </div>
                @else
                <a href="/login"
                    class="inline-flex px-8 py-3 text-xs tracking-widest text-white bg-green-700 border-0 rounded-sm focus:outline-none hover:bg-green-800"
                    x-on:click="login = true">SIGN IN</a>
                @endauth
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul id="nav-list"
                    class="flex flex-col gap-3 p-4 mt-4 text-sm font-medium text-gray-700 list-inside border border-gray-100 rounded-lg md:text-gray-800 md:p-0 md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="/" id="nav-text" class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="#" id="nav-text" class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">About</a>
                    </li>
                    <li>
                        <a href="#" id="nav-text" class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">Services</a>
                    </li>
                    <li>
                        <a href="#" id="nav-text" class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- offline state --}}
        <div wire:offline class="flex items-center justify-center w-full p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="flex items-center justify-center gap-1">
                <svg class="inline w-5 fill-yellow-800" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M790-56 414-434q-47 11-87.5 33T254-346l-84-86q32-32 69-56t79-42l-90-90q-41 21-76.5 46.5T84-516L0-602q32-32 66.5-57.5T140-708l-84-84 56-56 736 736-58 56Zm-310-64q-42 0-71-29.5T380-220q0-42 29-71t71-29q42 0 71 29t29 71q0 41-29 70.5T480-120Zm236-238-29-29-29-29-144-144q81 8 151.5 41T790-432l-74 74Zm160-158q-77-77-178.5-120.5T480-680q-21 0-40.5 1.5T400-674L298-776q44-12 89.5-18t92.5-6q142 0 265 53t215 145l-84 86Z"/></svg>
                <span class="font-medium">You're Offline!</span>
                <span>Please turn on your internet connection.</span>
            </div>
        </div>
    </nav>

    @empty(!auth()->user())
    @if(!empty(session('message')))

    <div x-data="{show: true}" x-show="show" x-transition.duration.300ms
        class="fixed z-50 right-2 top-[6rem] w-full max-w-xs px-4 py-6 text-gray-500 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400"
        role="alert">
        <div class="flex">
            <div class="text-sm font-normal ms-3">
                <span class="mb-2 text-sm font-semibold text-gray-900 dark:text-gray-800">Verification</span>
                <div class="mb-2 text-sm font-normal">
                    <p>{{session('message')}}</p>
                </div>
            </div>
            <button type="button" x-on:click="show = false"
                class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-gray-800 dark:bg-gray-800 dark:hover:bg-gray-700"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>

    @elseif(empty(auth()->user()->email_verified_at))

    <div x-data="{show: true}" x-show="show" x-transition.duration.300ms
        class="fixed z-50 right-2 top-[6rem] w-full max-w-xs px-4 py-6 text-gray-500 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400"
        role="alert">
        <div class="flex">
            <div class="text-sm font-normal ms-3">
                <span class="mb-2 text-sm font-semibold text-gray-900 dark:text-gray-800">Your email is not
                    verified</span>
                <div class="mb-2 text-sm">
                    <p>Greeting! {{auth()->user()->name}},</p>
                    <p>your account is not verified in our system, please check your email to verify.</p>
                </div>
                <form action="/email/verification-notification" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex px-5 py-1.5 text-xs font-medium text-center text-gray-100 bg-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Verify Now
                    </button>
                </form>
            </div>
            <button type="button" x-on:click="show = false"
                class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-gray-800 dark:bg-gray-800 dark:hover:bg-gray-700"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>

    @endif
    @endempty
</div>