@section('title', 'Login | The Cajuput Spa')

<section class="flex items-center justify-center min-h-screen py-8 bg-gradient-to-bl from-green-50 via-lime-50 to-green-100 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center w-full h-full gap-3 mx-6 bg-white rounded-md shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">       

        <div class="w-full p-6 sm:p-8">
            <h1
                class="mb-4 text-4xl font-bold text-center text-gray-900 dark:text-white">
                    Login
            </h1>
            <form class="space-y-4" wire:submit.prevent="submit">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Email</label>
                    <input type="email" id="email" placeholder="Email" wire:model="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('email')<span class="text-xs text-red-600">*{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" placeholder="Password" wire:model="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('password')<span class="text-xs text-red-600">*{{ $message }}</span> @enderror
                </div>
            </form>
            <div class="flex flex-col-reverse gap-1 space-y-1">
                <button x-on:click="$wire.submit"
                    class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 tracking-widest rounded-sm text-xs px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Login
                </button>
                <a href="/forgot" wire:navigate 
                    class="mt-2 text-sm text-right hover:underline">
                    Forgot Password?
                </a>
            </div>
            <p class="mt-4 text-sm font-light text-center text-gray-500 dark:text-gray-400">
                Doesn't have an account? 
                <a href="/register" wire:navigate 
                    class="font-medium text-green-700 text-nowrap hover:underline dark:text-green-500">
                    Register Here
                </a>
            </p>
            <livewire:auth.ssobutton>
        </div>
    </div>
</section> 