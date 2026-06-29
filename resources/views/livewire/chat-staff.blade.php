<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="grid grid-cols-3 shadow-md h-fit rounded-xl">
        <div class="w-full p-2">
            <div class="flex items-center justify-between px-2 mt-4">
                <span class="text-2xl font-bold">Chat</span>
                @if ($totalUnRead > 0)
                    <span class="text-sm text-gray-600">({{$totalUnRead}} unread messages)</span>
                @endif
            </div>
            <form wire:submit='search' class="max-w-md p-2 mx-auto mt-2">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:keyup='search()' wire:model="keyword"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Mockups, Logos..." required />
                </div>
            </form>
            <div class="mt-4 overflow-auto h-96">
                @foreach ($users as $user)
                <div class="mr-1 cursor-pointer rounded-xl hover:bg-gray-100" wire:click='show({{$user->id}})'>
                    <div class="grid items-center justify-between grid-cols-4 px-3 py-2 rounded-lg gap-y-1">
                        <span class="col-span-3 text-lg font-semibold">{{strlen($user->name) > 15 ? substr($user->name,
                            0, 15 - strlen($user->name)) . '...' : $user->name}}</span>
                        <span class="text-sm text-gray-400 w-fit place-self-end">{{$user->lastChat->created_at}}</span>
                        @if ($user->unread < 1 AND $user->lastChat->message == null)
                        <span class="w-full col-span-3 text-sm text-gray-400">Start message...</span>
                        @else
                        <span class="w-full col-span-3 text-sm text-gray-400">{{strlen($user->lastChat->message) > 30 ?
                            substr($user->lastChat->message, 0, 30 - strlen($user->lastChat->message)) . '...' :
                            $user->lastChat->message}}</span>
                        @endif
                        @if ($user->unread > 0)
                        <span
                            class="block px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full me-2 dark:bg-red-900 dark:text-red-300 w-fit place-self-end">{{$user->unread}}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-full col-span-2 bg-gray-200">
            @if (empty($messages))
            <div class="flex flex-col items-center justify-center h-full">
                <svg class="w-40 h-40 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                </svg>
                <span class="mb-1 text-3xl font-bold">Mari memulai obrolan!</span>
                <span>Pilih pesan di samping untuk mulai chat dengan penjual.</span>
            </div>
            @else
            <div class="grid gap-y-5 items-start content-start w-full grid-cols-1 p-4 overflow-auto h-[465px]"> 
                @foreach ($messages as $message)
                <div class="w-fit h-fit p-4 border-gray-200 bg-gray-50 dark:bg-gray-700
                {{auth()->user()->id == $message->sender_id ? "justify-self-end rounded-s-xl rounded-b-xl"
                    : "rounded-e-xl rounded-es-xl" }}">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{auth()->user()->id ==
                            $message->sender_id ? 'You' : 'Staff'}}</span>
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{$message->created_at}}</span>
                    </div>
                    <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                        {{ $message->message }}
                    </p>
                </div>
                @endforeach
            </div>
            <form class="px-4 py-3 bg-white" wire:submit="save">   
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <input type="search" wire:model="message" placeholder="Type a message" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-6 h-6 text-gray-100 rotate-90 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m12 18-7 3 7-18 7 18-7-3Zm0 0v-5" />
                        </svg>
                    </button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>