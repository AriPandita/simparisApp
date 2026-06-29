@section('title', $params->service_name.' | The Cajuput Spa')

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
                <h1 class="text-3xl font-extrabold text-center text-white drop-shadow-md sm:text-4xl md:text-5xl lg:text-6xl">{{$params->service_name}}</h1>
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
                            <img src="{{'/storage/img/service/'.$params->imgdir}}" class="object-cover w-full h-full">
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </header>

    <section id="header" class="flex items-center mx-auto aspect-[3/1] max-w-screen-2xl bg-green-50">
        <div class="max-w-screen-lg px-3 py-5 mx-auto space-y-5 text-gray-600 scroll-mt-20">
            <h2 class="text-xs tracking-widest text-center text-gray-400">THE CAJUPUT SERVICE</h2>
            <h3 class="font-serif text-4xl tracking-wide text-center text-gray-800">{{$params->service_name}}</h3>
            <h4 class="font-serif text-xl tracking-wide text-center text-gray-800">Rp {{number_format($params->price, 0, '.', '.')}}</h4>
            <p class="leading-loose tracking-widest text-center">{{$params->details}}</p>
            <div class= "flex justify-center">
                <a href="/payment" class="px-6 py-3 text-xs tracking-widest text-white bg-green-700 border-0 rounded-sm focus:outline-none hover:bg-green-800">Book now</a>
            </div>
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

    <section id="service" class="max-w-screen-xl mx-auto mt-14 scroll-mt-20 splide">
        <h2 class="py-3 font-serif text-4xl text-center">More Services</h2>
        <div class="px-5 mx-auto splide__track">
            <ul class="splide__list">
                @foreach ($service as $item)
                {{-- card service --}}
                <div class="p-4 md:w-1/3 splide__slide">
                    <div class="h-full overflow-hidden rounded shadow-md border-opacity-60">
                        <img class="object-cover object-center w-full lg:h-48 h-36"
                            src="{{asset('storage/img/service/'.$item->imgdir)}}" alt="blog">
                        <div class="m-6">
                            <div class="">
                                <span class="text-xs font-medium tracking-widest text-gray-400 title-font">PACKAGE | 30 MIN</span>
                                <h3 class="text-lg font-medium text-gray-800 title-font">{{$item->service_name}}</h3>
                                <div class="flex gap-6">
                                    <button class="text-green-600 text-md ">
                                        <i class="mr-1 fa-regular fa-star"></i>
                                        4.5
                                    </button>
                                    <ul class="list-disc">
                                        <li class="items-center text-gray-400">
                                            IDR {{ number_format($item->price, 0, '.', '.') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="mt-2 text-justify text-gray-600 line-clamp-3">
                                {{ $item->details }}
                            </p>
                            <div class="flex flex-wrap items-center justify-between text-md">
                                <a wire:navigate href="/service/{{$item->id}}"
                                    class="inline-flex px-8 py-3 mt-5 text-xs tracking-widest text-white bg-green-700 border-0 rounded-sm focus:outline-none hover:bg-green-800">
                                    MORE DETAILS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </ul>
        </div>
    </section>
    
    {{-- testimonial --}}
    <section class="mt-10 py-14 bg-sky-100">
        
        <h2 class="mb-5 font-serif text-4xl text-center">What People Think?</h2>
        <div id="testimonial" class="max-w-screen-xl mx-auto splide">
            <div class="p-5 splide__track h-content">
                <ul class="splide__list">
                    @foreach ($collection as $i => $feedback)
                    <li class="splide__slide">
                        {{-- card --}}
                        <div class="flex flex-col h-full gap-3 p-5 mx-3 bg-white rounded-lg">
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-3 flex-nowrap">
                                    {{-- profile pic --}}
                                    <div class="text-green-600 bg-green-200 border border-green-600 rounded-full size-12">
                                        @if($feedback->imgdir)
                                        <img src="/storage/img/profilepic/{{$feedback->imgdir}}" class="object-cover w-full h-full rounded-full">
                                        @else
                                        <svg class="w-12 h-10 mx-auto text-green-600" xmlns="http://www.w3.org/2000/svg" width="47" height="67" viewBox="0 0 47 67" fill="none">
                                            <path d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z" fill="currentColor"/>
                                            <path d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z" fill="currentColor"/>
                                            <path d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z" fill="currentColor"/>
                                            <path d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z" fill="currentColor"/>
                                            <path d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z" fill="currentColor"/>
                                        </svg>
                                        @endif
                                    </div>
                                    {{-- detail --}}
                                    <div class="flex flex-col justify-center text-xs w-">
                                        <span class="text-sm font-semibold text-gray-800">{{$feedback->name}}</span>
                                        <span class="text-gray-500">{{date_format(new DateTime($feedback->updated_at), "j F Y")}}</span>
                                        <span class="text-gray-400 line-clamp-1">{{$name[$i]->selected_services}} | {{$feedback->room_name}}</span>
                                    </div>
                                </div>
                                {{-- score --}}
                                <div class="flex items-end justify-center">
                                    <span class="text-4xl font-extrabold text-green-500">
                                        {{$feedback->rate}}
                                    </span>
                                    <span class="font-semibold text-gray-400">/5</span>
                                </div>
                            </div>
                            {{-- comment --}}
                            <div>
                                <span class="font-semibold">{{$feedback->title}}</span>
                                <p class="text-sm tracking-wide text-gray-500 line-clamp-5">{{$feedback->message}}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- gallery --}}
        <h2 class="my-10 font-serif text-4xl text-center">{{$params->service_name}} Gallery</h2>
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
<script src="{{asset('js/landing/splide.js')}}"></script>
<script src="{{asset('js/landing/navbar.js')}}"></script>
@endpush
