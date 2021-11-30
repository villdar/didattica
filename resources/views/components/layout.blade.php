<!doctype html>

<title>Didattic@</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&display=swap" rel="stylesheet">

<script src="https://d3js.org/d3.v4.js"></script>

@livewireStyles

<!-- include libraries(jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        /* overflow: hidden; */
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }

    @media screen and (min-width: 1024px) {
        .media-block {
            display: block !important;
        }
    }

    [x-cloak] {
        display: none !important;
    }

</style>

<body style="font-family: 'Montserrat', sans-serif" id="didattica">
    <section class="px-6 py-2">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="https://www.suffp.swiss/sites/all/themes/onecms/logo-it.svg" alt="SUFFP" width="165" height="16">
                </a>
            </div>

            <div class="flex items-center mt-8 md:mt-0">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="pl-20 pr-8 text-xs font-bold uppercase">
                                {{ auth()->user()->name }} !
                            </button>
                        </x-slot>

                        <x-dropdown-item
                                         href="{{ route('profile') }}"
                                         >
                            Profilo
                        </x-dropdown-item>

                        @admin
                        <x-dropdown-item
                                         href="/admin/posts"
                                         :active="request()->is('admin/posts')">
                            Dashboard
                        </x-dropdown-item>

                        <x-dropdown-item
                                         href="/admin/posts/create"
                                         :active="request()->is('admin/posts/create')">
                            Nuovo strumento
                        </x-dropdown-item>
                        @endadmin

                        @admin
                        <hr>
                        <x-dropdown-item href="{{ asset('storage/' . 'ManualeAmministratore.pdf') }}">
                            Guida per l'admin
                        </x-dropdown-item>
                        @endadmin
                        <x-dropdown-item href="{{ asset('storage/' . 'ManualeUtente.pdf') }}">
                            Guida per l'utente
                        </x-dropdown-item>
                        <hr>
                        <x-dropdown-item
                                         href="#"
                                         x-data="{}"
                                         @click.prevent="document.querySelector('#logout-form').submit()"
                                         class="font-bold">
                            Log Out
                        </x-dropdown-item>
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                @else
                    <a href="/register"
                       class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                        Registrati
                    </a>

                    <a href="/login"
                       class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                        Log In
                    </a>
                @endauth

                <a href="#newsletter"
                   class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-blue-500 rounded-full">
                    Iscriviti per rimanere aggiornato
                </a>
            </div>
        </nav>
        {{ $slot }}
        @auth
            <x-support-bubble />
        @endauth

        <footer id="newsletter"
                class="px-10 py-16 mt-16 text-center bg-gray-100 border border-black border-opacity-5 rounded-xl">
            <h5 class="text-3xl">Rimani aggiornato sui nuovi strumenti per la didattica.</h5>
            <p class="mt-3 text-sm">Promettiamo di non intasarti la mail con spam :)</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto rounded-full lg:bg-gray-200">

                    <form method="POST" action="/newsletter" class="text-sm lg:flex">
                        @csrf

                        <div class="flex items-center lg:py-3 lg:px-5">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <input
                                    name="email"
                                    type="text"
                                    placeholder="La tua mail"
                                    class="py-2 pl-4 lg:bg-transparent lg:py-0 focus-within:outline-none">
                                </div>

                                <button type="submit"
                                class="px-8 py-3 mt-4 text-xs font-semibold text-white uppercase transition-colors duration-300 bg-blue-500 rounded-full hover:bg-blue-600 lg:mt-0 lg:ml-3">
                                Iscriviti
                            </button>
                        </form>
                    </div>
                </div>
                @error('email')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
        </footer>
    </section>

    <x-flash />
</body>

@livewireScripts
@livewireChartsScripts

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 200
    });

    $('.summernote').summernote({
        height: 200,
        dialogsInBody: true
    });
</script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
