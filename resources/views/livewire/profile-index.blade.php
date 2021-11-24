<div class="grid space-y-2">
    <label class="pr-2 font-semibold uppercase">Nome :</label>
    <input wire:model="name" type="text" class="w-3/12 p-2 text-xs border border-solid rounded-lg" />
        @if ($errors->has('name'))
            <p class="font-bold text-red-400">Il campo nome è obbligatorio</p>
        @endif
    <label class="pr-2 font-semibold uppercase">Email :</label>
    <input wire:model="email" type="text" class="w-3/12 p-2 text-xs border border-solid rounded-lg" />
        @if ($errors->has('email'))
            <p class="font-bold text-red-400">Inserisci un indirizzo email valido</p>
        @endif
        @if ($email !== $prevEmail)
            <label class="pr-2 font-semibold uppercase">Password Attuale :</label>
            <input wire:model="current_password_for_email" type="password" class="w-3/12 p-2 text-xs border border-solid rounded-lg" />
            @if ($errors->has('current_password_for_email'))
                <p class="font-bold text-red-400">Inserisci la password attuale</p>
            @endif
        @endif
        <label class="pr-2 font-semibold uppercase">Password :</label>
        <input wire:model="password" type="password" class="w-3/12 p-2 text-xs border border-solid rounded-lg" />

            @if ($errors->has('password'))
                <p class="font-bold text-red-400">Inserisci una password valida</p>
            @endif

            @if (!empty($password))
                <label class="pr-2 font-semibold uppercase">Conferma nuova Password:</label>
                <input wire:model="password_confirmation" type="password" class="w-3/12 p-2 text-xs border border-solid rounded-lg" />
                @if ($errors->has('password_confirmation'))
                    <p class="font-bold text-red-400">Reinserisci la nuova password</p>
                @endif
                <br>
                <label class="pr-2 font-semibold uppercase">Password Attuale :</label>
                <input wire:model="current_password_for_password" type="password" class="w-3/12 p-2 text-xs border border-solid rounded-lg" />
                @if ($errors->has('current_password_for_password'))
                    <p class="font-bold text-red-400">Inserisci la tua attuale password</p>
                @endif
            @endif
    </div>
    <button wire:click="save" class="px-4 py-3 mt-10 text-xs font-bold text-white uppercase transition duration-150 ease-in bg-blue-400 border border-blue hover:bg-blue-500 rounded-xl">Salva</button>
</div>
