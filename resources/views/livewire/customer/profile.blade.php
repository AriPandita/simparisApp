@section('title', 'Profile | The Cajuput Spa')

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
@endsection

@section('navbar')
    <livewire:payment-user.navbar>
@endsection

<div x-data="{
    popup : false,
    b_popup : false,
    title : '',
    subtitle : '',
    dismiss : false,
    }" 
    x-init="
    $wire.on('save', () => {
        popup = true,
        title =  'Success',
        subtitle = 'Your profile has been updated.',
        dismiss = true
    });
    $wire.on('success', () => {
        popup = true,
        title =  'Success',
        subtitle = 'Link to change your password has been sent to your email.',
        dismiss = true
    });
    $wire.on('error', () => {
        popup = true,
        title = 'Error',
        subtitle = 'Email not found.',
        dismiss = true
    });"
    class="max-w-screen-xl mx-auto mt-14 p-14">
        <form class="flex flex-col gap-4 mb-4 md:flex-row" wire:submit.prevent='save' enctype="multipart/form-data">
            <div class="flex flex-col items-center flex-shrink gap-3 ">
                <span class="font-semibold">Profile Picture</span>
                @error('image')<span class="text-xs text-red-600">*{{ $message }}</span>@enderror
                <label for="choose-file" class="md:mx-12 hover:cursor-pointer">
                    <div id="img-preview" class="grid border-2 rounded-full border-neutral-400 size-32 md:size-80 place-content-center place-items-center">
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}" class="object-cover my-auto rounded-full aspect-square"/>
                        @elseif ($imgdir)
                            <img src="/storage/img/profilepic/{{$imgdir}}" style="width: inherit" class="object-cover my-auto rounded-full aspect-square"/>
                        @else
                        <svg class="text-green-600/50 size-18" xmlns="http://www.w3.org/2000/svg" width="47" height="67" viewBox="0 0 47 67" fill="none">
                            <path d="M32.2534 35.0758C31.9665 28.4062 32.7362 19.9136 35.6545 16.0616C38.3446 19.351 40.1858 26.6491 40.6336 33.7301C41.1442 41.8027 40.4765 50.7097 41.0175 56.0938C35.8984 50.3284 32.5984 43.0931 32.2534 35.0758Z" fill="currentColor"/>
                            <path d="M15.0568 43.3456C15.5612 41.1027 17.8277 37.4735 19.9215 36.4858C20.4374 39.2014 20.214 42.4674 19.5212 45.4846C18.4449 49.0549 16.5138 52.5348 14.6788 54.0316C14.2252 50.2264 14.2398 46.9778 15.0568 43.3456Z" fill="currentColor"/>
                            <path d="M22.2921 43.579C21.913 33.6489 25.8593 29.1691 29.0237 25.584C28.1385 33.1697 28.2064 39.6035 28.9245 46.6622C29.7433 54.7094 30.8315 61.3839 27.8856 66.8618C27.3108 59.2897 22.821 57.435 22.2921 43.579Z" fill="currentColor"/>
                            <path d="M15.2263 33.6831C20.1419 30.5857 21.3679 28.8592 24.303 24.8994C20.0219 25.4477 16.4366 26.564 13.9915 27.9601C8.90698 30.8634 7.22337 34.6077 6.51866 39.1355C9.50152 36.2873 13.3256 34.8808 15.2263 33.6831Z" fill="currentColor"/>
                            <path d="M14.6743 14.123C9.32664 16.4918 2.05933 21.653 1.27074 26.7197C5.92812 24.4634 14.5338 23.3186 21.1314 20.4254C29.3082 16.8398 32.3821 14.1161 37.1005 11.2094C29.9544 8.88255 20.7656 11.4248 14.6743 14.123Z" fill="currentColor"/>
                        </svg>
                        <div class="hidden md:block">
                            <center class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></center>
                            <center class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or Webp</center>
                        </div>
                        @endif
                    </div>
                    <input class="hidden" wire:model="image" type="file" id="choose-file" accept="image/png, image/jpeg, image/webp">
                </label>
            </div>
            <div class="flex flex-col self-start flex-grow w-full gap-3">
                <div>
                    <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <p type="text" x-text="$wire.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5" disabled></p>
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                    <input wire:model='name' type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5 @error('name') {{'outline-red-400 border-red-400'}} @enderror"/>
                    <div>
                        @error('name')<span class="text-xs text-red-600">*{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                    <input wire:model='phone' type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5 @error('phone') {{'outline-red-400 border-red-400'}} @enderror"/>
                    <div>
                        @error('phone')<span class="text-xs text-red-600">*{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <textarea wire:model='address' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5 @error('address') {{'outline-red-400 border-red-400'}} @enderror" rows="3"></textarea>
                    <div>
                        @error('address')<span class="text-xs text-red-600">*{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <div class="relative" x-data="{country:[], open: false}">
                        <label for="countryname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                        <input type="text" id="country" x-ref="country" x-on:click="open = true" x-on:keyup="
                            fetchData($event.target.value).then(data => {
                            data = data.slice(0, 5);
                            country = data
                            }).catch(error => {
                            country = [];
                            }), open = true"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xs block w-full p-2.5 @error('country') {{'outline-red-400 border-red-400'}} @enderror"
                            placeholder="Your country..." required="" wire:model.live='country'>
                        <div>
                            @error('country')<span class="text-xs text-red-600">*{{ $message }}</span> @enderror
                        </div>
                        <div x-show="open" x-transition x-on:click.away="open = false"
                            class="absolute left-0 z-10 w-full bg-white divide-y divide-gray-100 shadow rounded-xs top-20 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button-2">
                                <template x-if="country.length === 0">
                                    <li class="px-4 py-2">No results found</li>
                                </template>
                                <template x-for="c in country">
                                    <li x-on:click="$wire.country = c.countryname.common, open = false, $wire.dispatchCountry(c.countryname.common),
                                        fetchData(c.countryname.common).then(data => {
                                        data = data.slice(0, 5);
                                        country = data
                                        }).catch(error => {
                                        country = [];
                                        })">
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <img x-bind:src="c.flags.png" class="w-5 h-5 mr-2 rounded-full" alt="" />
                                                <span x-text="c.countryname.common"></span>
                                            </div>
                                        </button>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="grid w-full gap-3 grid-cols place-self-end">
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 tracking-widest rounded-sm text-xs px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Save
                        </button>
                        @empty(!$password)
                        <button type="button" x-on:click="popup = true, title = 'Change Password', subtitle = 'Are you sure you want to change your password? Link to change your password will be send through your email.', dismiss = false"
                        class="text-green-800 font-semibold bg-white hover:bg-gray-200 border-2 border-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 tracking-widest rounded-sm text-xs px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Change Password
                        </button>
                        @endempty
                    </div>
                </div>
            </div>
        </form>

        <div x-show="popup" x-cloak x-transition.1000ms
        class="flex overflow-y-auto overflow-x-hidden backdrop-brightness-95 backdrop-blur-sm fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-screen">
        <div class="relative max-w-sm max-h-full">
            <div x-on:click.away="popup = false" class="grid grid-cols-1 p-5 bg-white rounded-md shadow justify-items-center dark:bg-gray-700">
                <svg class="w-16 h-16 text-green-600 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>                  
                <span x-text="title" class="text-lg font-semibold tracking-wider"></span>
                <span x-text="subtitle" class="text-sm tracking-wider text-center"></span>
                <div class="mt-5">
                    <button x-show="!dismiss" wire:click="changePassword, popup = false"
                        class="px-5 py-2 text-xs font-medium tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Continue</button>
                    <button x-show="dismiss" wire:click="dismiss = false, popup = false"
                        class="px-5 py-2 text-xs font-medium tracking-wider text-white bg-green-700 border-2 border-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Okay</button>
                </div>
            </div>
        </div> 
    </div>
</div>


@push('scripts')
    {{-- <script>
        const chooseFile = document.getElementById("choose-file");
        const imgPreview = document.getElementById("img-preview");
        
        chooseFile.addEventListener("change", function () {
            getImgData();
        });
        
        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img class="object-cover my-auto rounded-full aspect-square" src="' + this.result + '" />';
            });    
            }
        }
    </script> --}}
    <script src="{{asset('js/payment-user/form-customer.js')}}"></script>
@endpush