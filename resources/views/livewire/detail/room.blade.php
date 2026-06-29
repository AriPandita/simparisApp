@section('title', $params->room_name. ' | The Cajuput Spa')

@section('head')
{{-- font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&family=Newsreader:opsz,wght@6..72,200;6..72,300;6..72,400&display=swap"
    rel="stylesheet">
{{-- flowbite js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
{{-- font awesome --}}
<script src="https://kit.fontawesome.com/7eaa0f0932.js" crossorigin="anonymous"></script>
{{-- splide --}}
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
@endsection

@section('navbar')
    <livewire:landing.navbar>
@endsection

<div>
    <header id="heroes" class="relative z-10 max-w-screen-2xl w-full top-0 2xl:left-1/2 2xl:translate-x-[-50%]">
        <div class="flex justify-center">
            <div class="absolute z-30 top-1/2 translate-y-[-50%]">
                <h1 class="text-3xl font-extrabold text-center text-white drop-shadow-md sm:text-4xl md:text-5xl lg:text-6xl">{{$params->room_name}}</h1>
            </div>
            <a href="#header" class="absolute z-30 grid bottom-4 justify-items-center hover:cursor-pointer">
                <span class="text-xl font-thin text-center text-white">Discover More</span>
                <svg class="w-10 h-10 text-white dark:text-white animate-bounce " aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width=".6"
                        d="m19 9-7 7-7-7" />
                </svg>
            </a>
        </div>
        <div class="shadow-[inset_0px_-150px_150px_-50px] shadow-stone-950 h-screen 2xl:aspect-video 2xl:h-auto">
            <section id="hero" class="splide max-w-screen-2xl z-[-2]">
                <div class="h-screen splide__track 2xl:h-auto 2xl:aspect-video">
                    <ul class="splide__list max-w-screen-2xl 2xl:aspect-video">
                        <li class="splide__slide">
                            <img src="/storage/img/room/{{$params->imgdir}}" class="object-cover w-full h-full">
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </header>

    <section id="header" class="flex items-center mx-auto aspect-[3/1] max-w-screen-2xl bg-green-50">
        <div class="max-w-screen-lg px-3 py-5 mx-auto space-y-5 text-gray-600 scroll-mt-20">
            <h2 class="text-xs tracking-widest text-center text-gray-400">THE CAJUPUT SERVICE</h2>
            <h3 class="font-serif text-4xl tracking-wide text-center text-gray-800">{{$params->room_name}}</h3>
            <p class="leading-loose tracking-widest text-center">{{$params->description}}</p>
            {{-- cajuput logo --}}
            <div class="flex justify-center mt-5">
                <svg class="w-12 h-12 text-green-600/50" xmlns="http://www.w3.org/2000/svg" width="47" height="67" viewBox="0 0 47 67" fill="none">
                    <path d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z" fill="currentColor"/>
                    <path d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z" fill="currentColor"/>
                    <path d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z" fill="currentColor"/>
                    <path d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z" fill="currentColor"/>
                    <path d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z" fill="currentColor"/>
                </svg>
            </div>
        </div>
    </section>

    {{-- gallery --}}
    <section class="py-10 bg-green-50">
        
        <h2 class="font-serif text-4xl text-center">{{$params->room_name}} Gallery</h2>
        <div class="grid max-w-screen-xl gap-1 p-1 mx-auto sm:grid-cols-2 md:grid-cols-4">
            <div class="aspect-square">
                <img src="/storage/img/hero/hero.webp" class="object-cover w-full h-full rounded">
            </div>
            <div class="aspect-square">
                <img src="/storage/img/hero/hero4.webp" class="object-cover w-full h-full rounded">
            </div>
            <div class="aspect-square">
                <img src="/storage/img/hero/hero2.webp" class="object-cover w-full h-full rounded">
            </div>
            <div class="aspect-square">
                <img src="/storage/img/hero/hero3.webp" class="object-cover w-full h-full rounded">
            </div>
        </div>
    </section>

    <livewire:landing.contact>
    <livewire:landing.footer>
</div>

@push('scripts')
<script src="{{asset('js/landing/navbar.js')}}"></script>
<script>
     new Splide('#hero', {
     type: 'fade',
     autoplay: true,
     interval: 8000,
     speed: 2000,
     rewind: true,
     pagination: false,
     arrows: false,
     breakpoints: {}
 }).mount();
</script>
@endpush

