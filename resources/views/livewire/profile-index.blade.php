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
                        <div class="lg:col-span-3 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Professione</label>
                            <input wire:model="profession" type="text" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="lg:col-span-3 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Ruolo/Materia</label>
                            <input wire:model="role" type="text" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="lg:col-span-3 sm:col-span-4">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="#39A2DB"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                <label class="block text-sm font-medium text-gray-700">Linkedin</label>
                            </div>
                            <input wire:model="linkedin" type="text" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="lg:col-span-3 sm:col-span-4">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#39A2DB">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                                <label class="block text-sm font-medium text-gray-700">Sito personale</label>
                            </div>
                            <input wire:model="personalSite" type="text" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
