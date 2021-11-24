@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-x-8"
         x-transition:enter-end="opacity-100 transform -translate-x-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform -translate-x-0"
         x-transition:leave-end="opacity-0 transform -translate-x-8"
         @keydown.escape.window="show = false"
         class="fixed bottom-0 left-0 z-20 flex justify-between w-full max-w-xs px-4 py-5 mx-2 my-8 bg-white border shadow-lg sm:max-w-sm rounded-xl sm:mx-6">
        <div class="flex items-center">

            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9DDAC6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <div class="ml-2 text-sm font-semibold text-gray-500 sm:text-base">{{ session('success') }}</div>
        </div>
        <button @click="show = false" class="text-gray-400 hover:text-gray-500">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif
