<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="icon" type="image/x-icon" href="/storage/img/favicon/cajuput.ico">
    <title>Welcome to The Cajuput Spa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&family=Newsreader:opsz,wght@6..72,200;6..72,300;6..72,400&display=swap" rel="stylesheet">
    
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/7eaa0f0932.js" crossorigin="anonymous"></script>
    
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900" x-data="{id: 0}">

    {{-- Navbar --}}
    @include('staff.navbar')

    {{-- Sidebar --}}
    @include('staff.sidebar')

    {{-- Content --}}
    <main class="h-auto p-1 pt-20 md:ml-64">
        <section class="p-3 antialiased bg-gray-50 dark:bg-gray-900 sm:p-5">
            <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
                @if ($errors->any())
                    <div class="p-4 mb-6 text-center text-white bg-red-500 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="p-4 mb-6 text-center text-white bg-green-500 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    {{-- <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button>
                            <div id="actionsDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                            Edit</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                            all</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-4">Customer Name</th>
                                    <th scope="col" class="px-4 py-3">Booked At</th>
                                    <th scope="col" class="px-4 py-3">Reservation Date</th>
                                    <th scope="col" class="px-4 py-3">Price</th>
                                    <th scope="col" class="px-4 py-3">Payment Status</th>
                                    <th scope="col" class="px-4 py-3">Booking Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="border-b dark:border-gray-700 hover:cursor-pointer">
                                        <th scope="row" data-modal-toggle="readModal{{ $item->id }}" data-modal-target="readModal{{ $item->id }}"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->name }}
                                        </th>
                                        <td class="px-4 py-3" data-modal-toggle="readModal{{ $item->id }}" data-modal-target="readModal{{ $item->id }}">
                                            {{ date_format(date_create($item->created_at), 'd M Y, H:i A') }}
                                        </td>
                                        <td class="px-4 py-3" data-modal-toggle="readModal{{ $item->id }}" data-modal-target="readModal{{ $item->id }}">
                                            {{ date_format(date_create($item->date), 'd M Y, H:i A') }}
                                        </td>
                                        <td class="px-4 py-3 max-w-[12rem] truncate" data-modal-toggle="readModal{{ $item->id }}" data-modal-target="readModal{{ $item->id }}">
                                            Rp.{{ number_format($item->total, 0, ',', '.') }}
                                        </td>
                                        <td class="px-4 py-3" data-modal-toggle="readModal{{ $item->id }}" data-modal-target="readModal{{ $item->id }}">
                                            {{$item->payment_status}}
                                        </td>
                                        {{-- <td class="px-4 py-3" data-modal-toggle="readModal{{ $item->id }}" data-modal-target="readModal{{ $item->id }}">
                                            <a href="{{ Storage::url('assets/receipt/'.$item->receipt) }}" target="_blank"
                                                class="underline decoration-dotted underline-offset-4">{{ $item->receipt }}</a>
                                        </td> --}}
                                        <td class="px-4 py-3">
                                            <form action="{{ route('updateTransaction', $item->id) }}"
                                                method="POST" id="status-form-{{ $item->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" id="status-{{ $item->id }}"
                                                    class="bg-transparent rounded-lg" data-item-id="{{ $item->id }}">
                                                    <option value="BOOKING CONFIRMED" @selected($item->booking_status == 'BOOKING CONFIRMED')>BOOKING CONFIRMED
                                                    </option>
                                                    <option value="BOOKING EXPIRED" @selected($item->booking_status == 'BOOKING EXPIRED')>BOOKING EXPIRED
                                                    </option>
                                                    <option value="PAYMENT CONFIRMED" @selected($item->booking_status == 'PAYMENT CONFIRMED')>PAYMENT CONFIRMED
                                                    </option>
                                                    <option value="IN PROGRESS" @selected($item->booking_status == 'IN PROGRESS')>IN PROGRESS
                                                    <option value="RESCHEDULED" @selected($item->booking_status == 'RESCHEDULED')>RESCHEDULED
                                                    </option>
                                                    <option value="CANCELLED" @selected($item->booking_status == 'CANCELLED')>CANCELLED
                                                    </option>
                                                    <option value="TRANSACTION COMPLETE" @selected($item->booking_status == 'TRANSACTION COMPLETE')>TRANSACTION COMPLETE
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Main modal -->
                                    <div id="readModal{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        {{ $item->name }}
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="readModal{{ $item->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-6 space-y-6">
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        Customer: {{ $item->name }}
                                                    </p>
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        Booked At: {{ date_format(date_create($item->created_at), 'd M Y, H:i A') }}
                                                    </p>
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        Reservation Date: {{ date_format(date_create($item->date), 'd M Y, H:i A') }}
                                                    </p>
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        Price: Rp.{{ number_format($item->total, 2, ',', '.') }}
                                                    </p>
                                                    {{-- <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        Receipt: <a href="{{ Storage::url('assets/receipt/'.$item->receipt) }}" target="_blank"
                                                            class="underline decoration-dotted underline-offset-4">{{ $item->receipt }}</a>
                                                    </p> --}}
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        Status: {{ ucfirst($item->booking_status) }}
                                                    </p>
                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button data-modal-hide="readModal{{ $item->id }}" type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('select[name="status"]').forEach(select => {
                select.addEventListener('change', function () {
                    document.getElementById('status-form-' + this.getAttribute('data-item-id')).submit();
                });
            });
        });
    </script>
</body>

</html>
