<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to The Cajuput Spa</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&family=Newsreader:opsz,wght@6..72,200;6..72,300;6..72,400&display=swap"
        rel="stylesheet">
    {{-- alpinejs --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/7eaa0f0932.js" crossorigin="anonymous"></script>
    {{-- splide --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body>
    <section class="bg-gradient-to-bl from-green-50 via-lime-50 to-green-100 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="flex justify-center items-center">
                <svg class="h-10 w-10 text-green-600" xmlns="http://www.w3.org/2000/svg" width="47" height="67" viewBox="0 0 47 67" fill="none">
                    <path d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z" fill="currentColor"/>
                    <path d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z" fill="currentColor"/>
                    <path d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z" fill="currentColor"/>
                    <path d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z" fill="currentColor"/>
                    <path d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z" fill="currentColor"/>
                </svg>
                <span id="logo" class="font-serif text-xl text-gray-700 ">The Cajuput Spa</span>
            </div>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 sm:p-8">
                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <ul class="list-disc ml-2">
                            <li class="text-sm">{{session('success')}}</li>
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <ul class="list-disc ml-2">
                            <li class="text-sm">{{session('status')}}</li>
                        </ul>
                    </div>
                    @endif                  
                    <h1
                        class="text-xl mb-4 font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login
                    </h1>
                    <form class="space-y-4" action="/login" method="POST">
                        @csrf
                        {{-- Alert untuk notifikasi jika terjadi error --}}
                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <ul class="list-disc ml-2">
                                @foreach ($errors->all() as $error)
                                <li class="text-sm">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="example@domain.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                                <a href="/forgot-password" class="text-sm underline">Forgot password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Sign In
                        </button>
                        <p class="text-sm font-light text-center text-gray-500 dark:text-gray-400">
                            Does'nt have an account? <a href="/register"
                                class="font-medium text-green-600 underline dark:text-green-500">Register
                                here</a>
                        </p>
                        <p class="text-sm font-light text-center text-gray-500 dark:text-gray-400 ">
                            Or Login With :
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ route('socialite.redirect', 'facebook') }}" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                                </svg>
                                Sign in with Facebook
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>