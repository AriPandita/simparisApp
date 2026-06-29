@section('title', 'Transaction | The cajuput Spa')

@section('head')
{{-- font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&family=Newsreader:opsz,wght@6..72,200;6..72,300;6..72,400&display=swap"
    rel="stylesheet">
{{-- date picker --}}
<script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.0/air-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.0/air-datepicker.min.css">
<link rel="stylesheet" href="{{asset('css/date.css')}}">
{{-- flowbite js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
{{-- font awesome --}}
<script src="https://kit.fontawesome.com/7eaa0f0932.js" crossorigin="anonymous"></script>
@endsection

@section('navbar')
<livewire:payment-user.navbar>
@endsection

<div x-data="{
        popup_c : false,
        popup_r : false,
        title : '',
        subtitle : '',
    }"
    x-init="$wire.on('success', (sub) => {
        notification = true,
        title =  'Notification',
        subtitle = sub
    });">
    {{-- content --}}
    <section class="mt-12 -mb-24 bg-white dark:bg-gray-900">
        <div class="px-10 py-16 mx-auto">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">My Transaction</h2>
            <div class="grid gap-5">
                @if($data->isEmpty())
                <div class="text-center">
                    <p class="mb-3 text-sm">Nothing to show here</p>
                    <a href="/payment" wire:click
                        class="px-5 py-2 text-xs tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm text-nowrap hover:bg-green-800">Book Now!</a>
                </div>
                @endif

                @foreach ($data as $i => $booking)
                <div class="flex gap-8 border-2 border-gray-100 rounded-md ">
                    <div class="grid w-full shadow">
                        <div class="flex items-center justify-between gap-3 py-3 mx-5 border-b-2">
                            <div class="flex gap-3">
                                <span class="text-lg font-bold">{{$name[$i]->selected_service}}</span>
                                <span x-data="{status: '{{$booking->booking_status}}'}" :class="{
                                    'text-blue-800 bg-blue-500/50': status !== 'TRANSACTION COMPLETE' && status !== 'BOOKING EXPIRED' && status !== 'CANCELLED' && status !== 'RESHCEDULED', 
                                    'text-yellow-800 bg-yellow-500/50': status === 'RESCHEDULED', 
                                    'text-green-800 bg-green-500/50': status === 'TRANSACTION COMPLETE', 
                                    'text-red-800 bg-red-500/50': status === 'BOOKING EXPIRED' || status === 'CANCELLED', 
                                    }" class="self-center px-2 py-1 overflow-hidden text-xs font-bold rounded-sm text text-clip">
                                    {{$booking->booking_status}}
                                </span>
                            </div>
                            <div x-data="{dropdownButton{{$booking->id}} : false}">
                                <button x-on:click="dropdownButton{{$booking->id}} = ! dropdownButton{{$booking->id}}"
                                    class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm bg-green-100 rounded-full hover:bg-green-100/50 focus:outline-none focus:ring-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                                    <svg class="w-5 h-5 text-green-700" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 128 512">
                                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path fill="currentColor"
                                            d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                                    </svg>
                                </button>
                                <div x-show ="dropdownButton{{$booking->id}}" x-cloak
                                    class="absolute mt-2 bg-white border-2 border-gray-100 divide-y divide-gray-100 rounded right-12">
                                    <ul class="z-10 flex flex-col gap-2 m-2 font-medium rounded-lg dark:bg-gray-800 dark:border-gray-700">
                                            
                                        
                                        @if($booking->booking_status === 'BOOKING CONFIRMED' || $booking->booking_status === 'PAYMENT CONFIRMED')
                                        <li>
                                            <button x-on:click="[
                                                $wire.popup = true,
                                                popup_r = true,
                                                popup_c = false,
                                                title = 'Reschedule this Booking?',
                                                subtitle = 'You only can reschedule once per transaction and you can not cancel your transaction after reschedule',
                                                $wire.id_booking = '{{$booking->external_id}}'
                                                ]"
                                                class="flex gap-2 px-3 py-2 text-gray-900 rounded hover:bg-green-50 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-5 h-5 text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m11.5 11.5 2.071 1.994M4 10h5m11 0h-1.5M12 7V4M7 7V4m10 3V4m-7 13H8v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L10 17Zm-5 3h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                                </svg>
                                                <span class="text-sm">
                                                    Reschedule
                                                </span>
                                            </button>
                                        </li>
                                        <li>
                                            <button 
                                                x-on:click="[
                                                $wire.popup = true,
                                                popup_c = true,
                                                popup_r = false,
                                                title = 'Cancel Booking?',
                                                subtitle = 'Are you sure you want to cancel this booking? Refund will be 50% of total order and will be processed in 1x24 hours',
                                                $wire.id_booking = '{{$booking->external_id}}'
                                                ]"
                                                class="flex w-full gap-2 px-3 py-2 text-gray-900 rounded hover:bg-green-50 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-5 h-5 text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                                <span class="text-sm">
                                                    Cancel Order
                                                </span>
                                            </button>
                                        </li>
                                        @endif
                                        <li>
                                            <button x-on:click="[
                                                $wire.popup = true,
                                                title = 'Booking Details',
                                                subtitle = 'For more information you can ask our staff via chat',
                                                ]"
                                                class="flex w-full gap-2 px-3 py-2 text-gray-900 rounded hover:bg-green-50 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <span class="text-sm">
                                                    Detail
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- transaction data --}}
                        <div class="flex w-full p-3 sm:gap-5 sm:flex-row">
                            <div class="self-center basis-1/3 max-w-64">
                                <div class="grid grid-flow-row aspect-video " :class="$refs.image{{$i}}.children.length > 1 ? 'grid-cols-2':'grid-cols-1'" x-ref="image{{$i}}">
                                    @php 
                                    $limit = 0;
                                    foreach ($image as $service) {
                                        if ($service->id_booking == $booking->id && $limit < 4) {
                                            echo "<img src='/storage/img/service/$service->imgdir' class='object-cover w-full h-full aspect-video'>";
                                            $limit++;
                                        }
                                    }
                                    @endphp
                                </div>
                            </div>
                            <div class="grid items-center self-center flex-grow gap-2 m-2">
                                <div class="flex gap-2 text-sm font-semibold sm:text-base">
                                    <span class="hidden sm:block">Date : </span>
                                    <span class="font-normal">{{date_format(new DateTime($booking->date), "l, j F Y")}}</span> 
                                </div>
                                <div class="flex gap-2 text-sm font-semibold sm:text-base">
                                    <span class="hidden sm:block">Time : </span>
                                    <span class="font-normal">{{date_format(new DateTime($booking->date), "h:i A")}}</span> 
                                </div>
                                <div class="flex gap-2 text-sm font-semibold sm:text-base">
                                    <span class="hidden sm:block">Room : </span>
                                    <span class="font-normal">{{$booking->room_name}}</span> 
                                </div>
                                <div class="flex gap-2 text-sm font-semibold sm:text-base">
                                    <span class="hidden sm:block">Payment Status : </span>
                                    <span x-data="{payment_status: '{{$booking->payment_status}}'}" :class="{
                                        'text-green-800 rounded-sm bg-green-500/50': payment_status === 'PAID',
                                        'text-yellow-800 rounded-sm bg-yellow-500/50': payment_status === 'PENDING',
                                        'text-red-800 rounded-sm bg-red-500/50': payment_status === 'EXPIRED'}"
                                        class="px-2 py-1 text-xs font-bold text-nowrap">{{$booking->payment_status}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mx-5 mb-3">
                            <div class="items-center gap-5 text-lg font-semibold ">
                                <span>Total</span>
                                <div class="text-nowrap">
                                    <span class="text-xs">Rp {{number_format($booking->total/$booking->pax, 0, ',', '.')}}</span>
                                    <span class="text-xs normal-case">x {{$booking->pax}} Person</span><br>
                                    <span class="text-base">Rp {{number_format($booking->total, 0, ',', '.')}}</span>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-end gap-2">
                                @if ($booking->payment_status === 'PENDING')
                                <a href={{$booking->payment_url}} target="_blank"
                                    class="self-end px-5 py-2 text-xs tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm text-nowrap hover:bg-green-800">Pay Now</a>
                                @elseif ($booking->booking_status === 'TRANSACTION COMPLETE')
                                <button wire:click="openfeedback('{{$booking->external_id}}')"
                                    class="self-end px-5 py-2 text-xs font-semibold tracking-wider text-green-700 border-2 border-green-700 rounded-sm text-nowrap hover:bg-gray-100">Feedback</button>
                                <a href="/payment" wire:click
                                    class="self-end px-5 py-2 text-xs tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm text-nowrap hover:bg-green-800">Repeat Order</a>
                                @else
                                <button 
                                    class="self-end px-5 py-2 text-xs tracking-wider text-white border-2 border-green-700 rounded-sm text-nowrap bg-green-700/75 hover:cursor-not-allowed"
                                    disabled>Repeat Order</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- Review Modal --}}
    <div x-show="$wire.review" x-cloak x-transition.1000ms aria-hidden="true"
        class="flex overflow-y-auto overflow-x-hidden backdrop-brightness-95 backdrop-blur-sm fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-screen">
        <div class="relative w-full max-w-xl max-h-full">
            {{-- Modal content --}}
            <form wire:submit.prevent="feedback" x-on:click.away="$wire.review = false" class="relative bg-white rounded-md shadow dark:bg-gray-700">
                {{-- Modal button --}}
                <div class="flex items-center justify-between pt-4 rounded-t pe-4 md:pt-5 dark:border-gray-600">
                    <button x-on:click="$wire.review = false" type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                {{-- Modal body --}}
                <div class="grid justify-center grid-cols-1 p-4 space-y-4 md:p-5">
                    @error('feedbacktitle') 
                    <div class="flex items-center p-4 text-red-800 rounded-sm bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-sm font-medium ms-3">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    @error('feedbackmessage') 
                    <div class="flex items-center p-4 text-red-800 rounded-sm bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-sm font-medium ms-3">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    @error('rating')
                    <div class="flex items-center p-4 text-red-800 rounded-sm bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-sm font-medium ms-3">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    <span class="w-full text-xl font-semibold text-center text-gray-900 dark:text-white">
                        Write your experience
                    </span>
                    <div 
                        x-data="
                        {
                            rating: 0,
                            hoverRating: 0,
                            ratings: [{'amount': 1, 'label':'Terrible'}, {'amount': 2, 'label':'Bad'}, {'amount': 3, 'label':'Okay'}, {'amount': 4, 'label':'Good'}, {'amount': 5, 'label':'Great'}],
                            rate(amount) {
                                if (this.rating == amount) {
                                this.rating = 0;
                                $wire.rating = null;
                                } else {
                                this.rating = amount; 
                                $wire.rating = amount;
                                }
                            },
                            currentLabel() {
                                let r = this.rating;
                                if (this.hoverRating != this.rating) r = this.hoverRating;
                                let i = this.ratings.findIndex(e => e.amount == r);
                                if (i >=0) {return this.ratings[i].label;} else {return ''};
                            }
                        }" 
                        x-init="$wire.on('resetFeedback', (rate) => {
                            rating = rate;
                            hoverRating = rate;
                        });"
                        class="flex flex-col items-center justify-center m-2 mx-auto space-y-2 rounded w-72">
                        <div class="flex space-x-0">
                            <template x-for="(star, index) in ratings" :key="index">
                                <button type="button" x-on:click="rate(star.amount)" x-on:mouseover="hoverRating = star.amount" onclick="this.blur();"
                                    x-on:mouseleave="hoverRating = rating" aria-hidden="true" :title="star.label"
                                    class="w-12 p-1 m-0 text-gray-100 rounded-sm cursor-pointer fill-current focus:outline-none focus:shadow-outline focus:text-green-700"
                                    :class="{'text-gray-300': hoverRating >= star.amount, 'text-green-600': rating >= star.amount && hoverRating >= star.amount}">
                                    <svg class="transition duration-150 w-15 stroke-green-600"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            </template>
                        </div>
                        <div class="p-2">
                            <input type="hidden" wire:model="rating">
                            <template x-if="rating || hoverRating">
                                <p x-text="currentLabel()"></p>
                            </template>
                            <template x-if="!rating && !hoverRating">
                                <p>Please Rate!</p>
                            </template>
                        </div>

                    </div>
                    <input class="bg-gray-50 p-2.5 mx-5 border text-sm rounded-sm border-gray-300" placeholder="Title" type="text" wire:model="feedbacktitle" :value="$wire.feedbacktitle">

                    <textarea id="message" rows="6" wire:model="feedbackmessage"
                        class="block p-2.5 mx-5 text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-300"
                        placeholder="Tell everyone about your experience"></textarea>
                </div>
                {{-- Modal footer --}}
                <div class="flex items-center justify-center gap-3 pb-4 rounded-b md:pb-8 dark:border-gray-600">
                    <button x-on:click="$wire.review = false" type="button"
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-green-700 bg-white border-2 border-green-700 rounded-sm focus:outline-none hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                    <button type="submit"
                        class="px-5 py-2 text-xs font-medium tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Notification Popup --}}
    <div x-show="$wire.popup" x-cloak x-transition.1000ms
        class="flex overflow-y-auto overflow-x-hidden backdrop-brightness-95 backdrop-blur-sm fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-screen">
        <div class="relative max-w-sm max-h-full">
            <div x-on:click.away="$wire.popup = false" class="grid grid-cols-1 p-5 bg-white rounded-md shadow justify-items-center dark:bg-gray-700">
                <svg class="w-16 h-16 text-green-600 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>                  
                <span x-text="title" class="text-lg font-semibold tracking-wider"></span>
                <span x-text="subtitle" class="text-sm tracking-wider text-center"></span>
                <div class="mt-5">
                    <button x-show="popup_c" wire:click="cancel, popup_c = false" 
                        class="px-5 py-2 text-xs font-medium tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Continue</button>
                    <button x-show="popup_r" wire:click="openReschedule, popup_r = false"
                        class="px-5 py-2 text-xs font-medium tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Continue</button>
                </div>
            </div>
        </div> 
    </div>

    {{-- Reshcedule Modal --}}
    <div x-show="$wire.reschedule" x-cloak x-transition.1000ms
    class="flex overflow-y-auto overflow-x-hidden backdrop-brightness-95 backdrop-blur-sm fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-screen">
    <div class="relative max-w-sm max-h-full">
        <form wire:submit.prevent="rescheduled" x-on:click.away="$wire.reschedule = false" class="relative space-y-4 bg-white rounded-md shadow dark:bg-gray-700">
                {{-- Modal button --}}
                <div class="flex items-center justify-between px-4 pt-4 rounded-t md:pt-5 dark:border-gray-600">
                    <p class="text-xl font-semibold">Select Date & Time</p>
                    <button x-on:click="$wire.reschedule = false" type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <livewire:payment-user.date-input>
                <input type="hidden" wire:model="date" value="">
                <input type="hidden" wire:model="time" velue="">
                {{-- Modal footer --}}
                <div class="flex items-center justify-center gap-3 pb-4 rounded-b md:pb-8 dark:border-gray-600">
                <button x-on:click="$wire.reschedule = false" type="button"
                    class="px-5 py-2 text-xs font-semibold tracking-wider text-green-700 bg-white border-2 border-green-700 rounded-sm focus:outline-none hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                <button type="submit"
                    class="px-5 py-2 text-xs font-medium tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
            </div>
        </form>
    </div>
    </div>

</div>


@push('scripts')
<script src="{{asset('js/auth/auth_popup.js')}}"></script>
<script src="{{asset('js/payment-user/date.js')}}"></script>
@endpush