{{-- testimonial --}}
<section id="review" class="mt-10 py-14 bg-sky-100">
    <h2 class="mb-5 font-serif text-4xl text-center">What People Think?</h2>
    <div id="testimonial" class="max-w-screen-xl mx-auto splide">
        <div class="p-5 splide__track h-content">
            <ul class="splide__list">
                @foreach ($data as $feedback)
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
                                    <svg class="w-12 h-10 text-green-600 " xmlns="http://www.w3.org/2000/svg" width="47" height="67" viewBox="0 0 47 67" fill="none">
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
                                    <span class="text-gray-400 line-clamp-1">{{$feedback->selected_services}} | {{$feedback->room_name}}</span>
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
    <h2 id="gallery" class="my-10 font-serif text-4xl text-center">The Cajuput Gallery</h2>
    <div class="grid max-w-screen-xl gap-1 p-1 mx-auto sm:grid-cols-2 md:grid-cols-4">
        <div class="aspect-square">
            <img src="/storage/img/hero/hero.webp" class="object-cover w-full h-full rounded">
        </div>
        <div class="aspect-square">
            <img src="/storage/img/hero/hero2.webp" class="object-cover w-full h-full rounded">
        </div>
        <div class="aspect-square">
            <img src="/storage/img/service/bodytreatment_20240725_111815.webp" class="object-cover w-full h-full rounded">
        </div>
        <div class="aspect-square">
            <img src="/storage/img/room/thecave_20240725_122413.webp" class="object-cover w-full h-full rounded">
        </div>
        <div class="aspect-square">
            <img src="/storage/img/hero/hero3.webp" class="object-cover w-full h-full rounded">
        </div>
        <div class="aspect-square">
            <img src="/storage/img/hero/hero4.webp" class="object-cover w-full h-full rounded">
        </div>
        <div class="aspect-square">
            <img src="/storage/img/room/thetropical_20240725_122434.webp" class="object-cover w-full h-full rounded">
        </div>
        <div class="aspect-square">
            <img src="/storage/img/service/relaxationpackage_20240725_110924.webp" class="object-cover w-full h-full rounded">
        </div>
    </div>
</section>