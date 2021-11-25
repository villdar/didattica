<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Informazioni personali</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Modifica qui le informazioni relative al tuo account.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="overflow-hidden shadow sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Nome</label>
                            <input wire:model="name" type="text" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if ($errors->has('name'))
                                <p class="font-bold text-red-400">Il campo nome è obbligatorio</p>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Indirizzo Email</label>
                            <input wire:model="email" type="text" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if ($errors->has('email'))
                                <p class="font-bold text-red-400">Inserisci un indirizzo email valido</p>
                            @endif
                            @if ($email !== $prevEmail)
                                <label class="flex mt-2 text-sm font-medium text-red-500">
                                    <svg class="w-6 h-6 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    Inserisci la tua password per confermare
                                </label>
                                <input wire:model="current_password_for_email" type="password" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @if ($errors->has('current_password_for_email'))
                                    <p class="font-bold text-red-400">Inserisci la password attuale</p>
                                @endif
                            @endif
                        </div>

                        <div class="col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Nuova Password</label>
                            <input wire:model="password" type="password" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if ($errors->has('password'))
                                <p class="font-bold text-red-400">Inserisci una password valida</p>
                            @endif
                        </div>
                        @if (!empty($password))
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Conferma la nuova Password</label>
                                <input wire:model="password_confirmation" type="password" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @if ($errors->has('current_password_for_email'))
                                    <p class="font-bold text-red-400">La password non coincide</p>
                                @endif
                            </div>

                            <div class="col-span-6 sm:col-span-4 lg:col-span-4">
                                <label class="flex text-sm font-medium text-red-500">
                                    <svg class="w-6 h-6 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    Inserisci la Password attuale
                                </label>
                                <input wire:model="current_password_for_password" type="password" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @if ($errors->has('current_password_for_password'))
                                    <p class="font-bold text-red-400">Inserisci la tua attuale password</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <button wire:click="save" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Salva
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
