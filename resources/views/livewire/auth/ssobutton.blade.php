<div class="w-full space-y-4">
    {{-- or --}}
    <div class="inline-flex items-center justify-center w-full">
        <hr class="w-10/12 h-px my-2 bg-gray-400 border-0 dark:bg-gray-700">
        <span class="absolute px-3 font-medium text-gray-700 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">or</span>
    </div>
    {{-- socialite button --}}
    <a href="{{route('socialite.redirect', 'google')}}" target="_blank" class="text-gray-800 w-full bg-white hover:bg-gray-50/90 focus:ring-4 focus:outline- focus:ring-gray-50 font-medium rounded-sm text-sm px-5 py-2.5 text-center inline-flex items-center justify-center border border-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 me-2">
            <title>Sign in with Google</title>
            <desc>Google G Logo</desc>
            <path
                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                class="fill-[#4285f4]"
            ></path>
            <path
                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                class="fill-[#34a853]"
            ></path>
            <path
                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                class="fill-[#fbbc05]"
            ></path>
            <path
                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                class="fill-[#ea4335]"
            ></path>
        </svg>
        Login with Google
    </a>
    {{-- <a href="{{route('socialite.redirect', 'facebook')}}" target="_blank" class="w-full justify-center text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-sm text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55">
        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
        </svg>
        Login with Facebook
    </a> --}}
    <div class="flex items-center justify-center hover:cursor-pointer" href="/" wire:navigate>
        <svg class="text-green-600 size-6" xmlns="http://www.w3.org/2000/svg" width="47" height="67" viewBox="0 0 47 67" fill="none">
            <path d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z" fill="currentColor"/>
            <path d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z" fill="currentColor"/>
            <path d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z" fill="currentColor"/>
            <path d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z" fill="currentColor"/>
            <path d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z" fill="currentColor"/>
        </svg>
        <span id="logo" class="font-serif text-sm text-gray-700 ">The Cajuput Spa</span>
    </div>
</div>
