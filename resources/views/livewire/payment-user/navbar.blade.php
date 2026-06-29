<div x-data="{sidebar : false}">
    <nav id="nav-container"
        class="fixed top-0 left-0 z-50 w-full bg-white border-b border-gray-200 select-none dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between w-full max-w-screen-xl p-4 mx-auto">
            
            {{-- navbar logo --}}
            <a href="/" class="flex items-center flex-1 basis-0">
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
                        class="hidden min-[385px]:block font-serif text-xl text-gray-700 md:text-gray-800">
                        The Cajuput Spa
                    </span>
                </div>
            </a>
            
            {{-- navbar right --}}
            <div class="flex flex-1 gap-3 place-content-end md:order-2 basis-0">
                <div class="relative">
                    @auth
                    {{-- profile picture --}}
                    <div x-on:click="sidebar = !sidebar" 
                        class="hidden text-green-600 bg-green-200 border border-green-600 rounded-full cursor-pointer size-12 md:block">
                        @if ($user)
                        <img src="/storage/img/profilepic/{{$user}}" class="rounded-full">
                        @else
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
                        @endif
                    </div>
                    {{-- profile notification --}}
                    @empty(auth()->user()->email_verified_at || session('message'))
                    <div
                        class="absolute inline-flex items-center justify-center w-5 h-5 text-xs text-gray-800 bg-red-500 border-2 border-white rounded-full -top-1 -end-1 dark:border-gray-900">
                        1
                    </div>
                    @endempty
                    @else
                    <a href="/login" wire:navigate
                        class="hidden px-8 py-3 text-xs tracking-widest text-center text-white bg-green-700 border-0 rounded-sm md:block focus:outline-none hover:bg-green-800">
                        Sign In
                    </a>
                    @endauth
                    {{-- hamburger button --}}
                    <button x-on:click="sidebar = !sidebar"
                        class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-sm md:hidden hover:bg-gray-100 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
            </div>


            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <ul 
                    class="flex flex-col gap-3 p-4 mt-4 text-sm font-medium text-gray-700 list-inside border border-gray-100 rounded-lg md:text-gray-800 md:p-0 md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="/" wire:navigate class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="/#header" class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">About</a>
                    </li>
                    <li>
                        <a href="/#service" class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">Services</a>
                    </li>
                    <li>
                        <a href="/#footer" class="py-2 pl-3 pr-4 md:hover:text-green-500 md:p-0">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- offline state --}}
        <div wire:offline
            class="flex items-center justify-center w-full p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="flex items-center justify-center gap-1">
                <svg class="inline w-5 fill-yellow-800" xmlns="http://www.w3.org/2000/svg" height="24"
                    viewBox="0 -960 960 960" width="24">
                    <path
                        d="M790-56 414-434q-47 11-87.5 33T254-346l-84-86q32-32 69-56t79-42l-90-90q-41 21-76.5 46.5T84-516L0-602q32-32 66.5-57.5T140-708l-84-84 56-56 736 736-58 56Zm-310-64q-42 0-71-29.5T380-220q0-42 29-71t71-29q42 0 71 29t29 71q0 41-29 70.5T480-120Zm236-238-29-29-29-29-144-144q81 8 151.5 41T790-432l-74 74Zm160-158q-77-77-178.5-120.5T480-680q-21 0-40.5 1.5T400-674L298-776q44-12 89.5-18t92.5-6q142 0 265 53t215 145l-84 86Z" />
                </svg>
                <span class="font-medium">You're Offline!</span>
                <span>Please turn on your internet connection.</span>
            </div>
        </div>
    </nav>

    {{-- Sidebar --}}
    <div x-show="sidebar" x-cloak
        x-on:click.away="sidebar = false"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start=""
        x-transition:leave-end="transform translate-x-64"
        x-transition:enter="transition ease-out duration-500 -mr-64"
        x-transition:enter-start=""
        x-transition:enter-end="transform -translate-x-64"
        class="fixed top-0 right-0 z-40 h-dvh pt-20 overflow-y-auto bg-white border min-w-52 dark:bg-gray-700 dark:divide-gray-600 @guest md:hidden @endguest">
        <div class="flex flex-col h-full">
            @auth
            {{-- sidebar greeting --}}
            <div class="flex items-center self-start gap-3 px-4 py-3 text-gray-900 dark:text-gray-800">
                {{-- logo --}}
                <div class="text-green-600 bg-green-200 border border-green-600 rounded-full md:hidden size-12"
                    class="w-10 h-10 rounded-full cursor-pointer">
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
                {{-- Greeting --}}
                <div>
                    <div>Hello! {{auth()->user()->name}}</div>
                    <div class="text-xs text-gray-500 truncate">{{auth()->user()->email}}</div>
                </div>
            </div>
            @endauth
            {{-- sidebar menu list --}}
            <ul class="flex-1 h-auto my-2 text-sm text-gray-700 dark:text-gray-200 md:hidden">
                <li> 
                    <a href="/" wire:navigate 
                    class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="/#header" 
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                          </svg>
                          
                        About
                    </a>
                </li>
                <li>
                    <a href="/#service" 
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                        <svg aria-hidden="true" 
                        class="flex-shrink-0 w-5 h-5 mr-1 text-gray-800"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M183.1 235.3c33.7 20.7 62.9 48.1 85.8 80.5c7 9.9 13.4 20.3 19.1 31c5.7-10.8 12.1-21.1 19.1-31c22.9-32.4 52.1-59.8 85.8-80.5C437.6 207.8 490.1 192 546 192h9.9c11.1 0 20.1 9 20.1 20.1C576 360.1 456.1 480 308.1 480H288 267.9C119.9 480 0 360.1 0 212.1C0 201 9 192 20.1 192H30c55.9 0 108.4 15.8 153.1 43.3zM301.5 37.6c15.7 16.9 61.1 71.8 84.4 164.6c-38 21.6-71.4 50.8-97.9 85.6c-26.5-34.8-59.9-63.9-97.9-85.6c23.2-92.8 68.6-147.7 84.4-164.6C278 33.9 282.9 32 288 32s10 1.9 13.5 5.6z"/></svg>    
                        Service
                    </a>
                </li>
                <li>
                    <a href="/#footer" 
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z"/>
                        </svg>
                        Contact
                    </a>
                </li>
                
            </ul>
            @auth
            {{-- signout --}}
            <div class="pt-1 mb-3 text-sm text-gray-700 border-t">
                <a href="/profile" wire:navigate
                    class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    Profile
                </a>
                <a href="{{Auth::user()->level == 'customer' ? '/transaction' : '/dashboard'}}"
                    wire:navigate
                    class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                    </svg>
                    My Transaction
                </a>
                @empty(auth()->user()->email_verified_at || session('message'))
                <form action="/email/verification-notification" method="POST" class="">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center justify-between w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-800">
                        Verify Your Email
                        <span class="w-3 h-3 bg-red-500 rounded-full dark:border-gray-900"></span>
                    </button>
                </form>
                @endempty
            </div>
            <a href="/logout"
                class="py-3 mx-4 mt-auto mb-3 text-xs tracking-widest text-center text-white bg-green-700 border-0 rounded-sm y-3 focus:outline-none hover:bg-green-800">
                Sign Out
            </a>
            @else
            <a href="/login" wire:navigate
                class="py-3 m-4 text-xs tracking-widest text-center text-white bg-green-700 border-0 rounded-sm md:hidden focus:outline-none hover:bg-green-800">
                Sign In
            </a>
            @endauth
        </div>
    </div>

    @auth
    @if(!empty(session('message')))

    <div x-data="{message: true}" x-show="message" x-transition.duration.300ms
        class="fixed z-50 right-2 top-[6rem] w-full max-w-xs px-4 py-6 text-gray-500 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400"
        role="alert">
        <div class="flex">
            <div class="text-sm font-normal ms-3">
                <span class="mb-2 text-sm font-semibold text-gray-900 dark:text-gray-800">Verification</span>
                <div class="mb-2 text-sm font-normal">
                    <p>{{session('message')}}</p>
                </div>
            </div>
            <button type="button" x-on:click="message = false"
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

    <div x-data="{email: true}" x-show="email" x-transition.duration.300ms
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
            <button type="button" x-on:click="email = false"
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
    @endauth
</div>