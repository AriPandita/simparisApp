<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="icon" type="image/x-icon" href="/storage/img/favicon/cajuput.ico">
    <title>Change Password | The Cajuput Spa</title>
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
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 sm:p-8">
                    @if (session('success'))
                    <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                        role="alert">
                        <ul class="ml-2 list-disc">
                            <li class="text-sm">{{session('success')}}</li>
                        </ul>
                    </div>
                    @endif                    
                    <h1
                        class="mb-4 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Reset Your Password
                    </h1>
                    <form class="space-y-4" action="/reset-password" method="POST">
                        @csrf
                        {{-- Alert untuk notifikasi jika terjadi error --}}
                        @if ($errors->any())
                        <div class="relative px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded"
                            role="alert">
                            <ul class="ml-2 list-disc">
                                @foreach ($errors->all() as $error)
                                <li class="text-sm">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <input type="hidden" name="token" value="{{request('token')}}">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Email</label>
                            <input type="email" name="email" id="email" value="{{request('email')}}"
                                class="bg-gray-50 border border-gray-300 text-gray-500 sm:text-sm rounded-sm focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password" placeholder="Password"
                                class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Reset Password</button>
                            <div class="flex items-center justify-center">
                                <svg class="text-green-600 size-6" xmlns="http://www.w3.org/2000/svg" width="47" height="67" viewBox="0 0 47 67" fill="none">
                                    <path d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z" fill="currentColor"/>
                                    <path d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z" fill="currentColor"/>
                                    <path d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z" fill="currentColor"/>
                                    <path d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z" fill="currentColor"/>
                                    <path d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z" fill="currentColor"/>
                                </svg>
                                <span id="logo" class="font-serif text-sm text-gray-700 ">The Cajuput Spa</span>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>